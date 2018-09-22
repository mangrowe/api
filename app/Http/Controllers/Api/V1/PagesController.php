<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Setting;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'settings' => Setting::where('organization_id', $request->input('organization_id'))->orderBy('code')->orderBy('info')->get(),
            'departments' => $this->tree($request),
        ]);
    }

    /**
     * Display an organogram structure with progress percentage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tree(Request $request)
    {
        $departments = Department::where('organization_id', $request->input('organization_id'))->orderBy('title')->select('id', 'parent_id', 'title as name')->get();

        return $this->buildTree($departments);
    }

    /**
     * Build an tree recursive.
     * 
     * @see https://stackoverflow.com/questions/29384548/php-how-to-build-tree-structure-list#answer-29384894
     * @return array
     */
    public function buildTree($elements, $parentId = 0) {
        $branch = [];

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $element['name'] =  $element['name'] .'  ['. $element->progress() .'%]';
                $branch[] = $element;
            }
        }

        return $branch;
    }
}
