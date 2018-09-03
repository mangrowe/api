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
        'organization_id', 'parent_id', 'cycle_id', 'user_id', 
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
}
