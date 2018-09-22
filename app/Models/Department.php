<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id', 'parent_id', 'title',
    ];

    /**
     * The organization associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * The parent associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    /**
     * The children associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    /**
     * The objectives associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

    /**
     * Calculate the department progress.
     *
     * @return float
     */
    public function progress()
    {
        $total = 0;
        $weightHorizontal = 40;
        $weightVertical = 60; 

        if(!count($this->children)) {
            $weightHorizontal = 100;
            $weightVertical = 0; 
        }

        $numerator = ($this->progressHorizontal() * $weightHorizontal) + ($this->progressVertical() * $weightVertical);

        $denominator = $weightHorizontal + $weightVertical;

        if($denominator) {
            $total = $numerator / $denominator;
        }

        return $total;
    }

    /**
     * Calculate the horizontal progress.
     *
     * @return float
     */
    public function progressHorizontal()
    {
        $total = 0;
        $objectivesProgress = 0;

        foreach($this->objectives as $objective) {
            $objectivesProgress += $objective->progress();
        }

        if(count($this->objectives)) {
            $total = $objectivesProgress / count($this->objectives);
        }

        return $total;
    }

    /**
     * Calculate the vertical progress.
     *
     * @return float
     */
    public function progressVertical()
    {
        $total = 0;
        $childrenProgress = 0;

        foreach($this->children as $children) {
            $childrenProgress += $children->progress();
        }

        if(count($this->children)) {
            $total = $childrenProgress / count($this->children);
        }

        return $total;
    }
}
