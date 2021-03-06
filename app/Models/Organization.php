<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * The users associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->orderBy('name');
    }

    /**
     * The teams associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * The cycles associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cycles()
    {
        return $this->hasMany(Cycle::class);
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
     * The keyResults associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keyResults()
    {
        return $this->hasMany(KeyResult::class);
    }

    /**
     * The departments associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * The setting associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
