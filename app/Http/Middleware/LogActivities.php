<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Log;
use App\Models\LogActivity;

class LogActivities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            $route  = $request->route();
            $req    = $request->all();
            $params = $route->parameters;
            list($controller, $action) = explode('.', $route->action['as']);
            
            if(in_array($controller, ['teams', 'keyResults', 'objectives'])) {
                $message  = trans('messages.' . $action) . ' ';
                $message .= trans('messages.of') .' ';
                $message .= trans('messages.'. $controller) .' ';
                $message .= trans('messages.by') .' ';
                $message .= Auth::guard('api')->user()->name;

                LogActivity::create([
                    'organization_id' => $req['organization_id'] ?? null,
                    'user_id' => Auth::guard('api')->user()->id,
                    'message' => $message,
                ]);
            }
        }
        return $next($request);
    }
}
