<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    /**
     * Strategic level.
     * 
     * @var string
     */
    const STRATEGIC = 'strategic';

    /**
     * Tactical level.
     * 
     * @var string
     */
    const TACTICAL = 'tactical';

    /**
     * Operational level.
     * 
     * @var string
     */
    const OPERATIONAL = 'operational';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id', 'department_id', 'parent_id', 'cycle_id', 'user_id', 
        'team_id', 'level', 'title', 'description',
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
     * The department associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * The cycle associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    /**
     * The leader associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The team associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * The parent associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Objective::class, 'parent_id');
    }

    /**
     * The children associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Objective::class, 'parent_id');
    }

    /**
     * The key results associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keyResults()
    {
        return $this->hasMany(KeyResult::class);
    }

    /**
     * The tags associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Build a search query for cycle, title, department, user and description.
     * 
     * @param array $query
     * @return array 
     */
    public function search($query)
    {
        $where = [];
        unset($query['quest']);

        if(isset($query['cycle_id'])) {
            $where[] = ['cycle_id', '=', $query['cycle_id']];
        }

        if(isset($query['title'])) {
            $where[] = ['title', 'like', '%'. $query['title'] .'%'];
        }

        if(isset($query['user_id'])) {
            $where[] = ['user_id', '=', $query['user_id']];
        }

        if(isset($query['department_id'])) {
            $where[] = ['department_id', '=', $query['department_id']];
        }

        if(isset($query['description'])) {
            $where[] = ['description', 'like', '%'. $query['description'] .'%'];
        }

        return $query;
    }

    /**
     * Calculate the objective progress.
     *
     * @return float
     */
    public function progress()
    {
        $total = 0;
        $keyResultsProgress = 0;

        foreach($this->keyResults as $keyResult) {
            $keyResultsProgress += $keyResult->progress();
        }

        if(count($this->keyResults)) {
            $total = $keyResultsProgress / count($this->keyResults);
        }

        return $total;
    }
}
