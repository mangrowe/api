<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id', 'title', 'description', 'start_at', 'end_at',
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
     * The objectives associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }
}
