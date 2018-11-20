<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total'];

    /**
     * The organizations that the user is associated.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    /**
     * The teams associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
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
     * The check-ins associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checkIns()
    {
        return $this->hasMany(CheckIn::class);
    }

    /**
     * Generates a random token for login access.
     * 
     * @return string
     */
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        return $this->api_token;
    }

    /**
     * Get the progress total.
     *
     * @return float
     */
    public function getTotalAttribute()
    {
        if($this->objectives) {
            return $this->objectives->sum('total') / count($this->objectives);
        }
        return 0;
    }
}
