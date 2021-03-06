<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyResult extends Model
{
    /**
     * Number type.
     * 
     * @var string
     */
    const TYPES = [
        'boolean' => 'boolean',
        'number' => 'number',
    ];
    
    /**
     * Greater than or equals to.
     * 
     * @var string
     */
    const GTE = 'gte';

    /**
     * Less than or equals to.
     * 
     * @var string
     */
    const LTE = 'lte';

    /**
     * Formats accepted.
     * 
     * @var string
     */
    const FORMATS = [
        'number' => 'number',
        'currency' => 'currency',
        'percentage' => 'percentage',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id', 'objective_id', 'user_id', 'title', 'description', 'type', 
        'criteria', 'initial', 'current', 'target', 'done', 'format',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total'];

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
     * The objective associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    /**
     * The responsable associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
     * Calculate the key result progress.
     *
     * @return float
     */
    public function progress()
    {
        if($this->type == 'boolean') {
            return $this->current / $this->target * 100;
        }else {
            if($this->criteria == 'gte') {
                $division = $this->target - $this->initial > 0 ? $this->target - $this->initial : 1;
                return  ($this->current - $this->initial) / $division * 100;
            }else {
                $division = $this->initial - $this->target > 0 ? $this->initial - $this->target : 1;
                return ($this->initial - $this->current) / $division * 100;
            }
        }
    }

    /**
     * Get the progress total.
     *
     * @return float
     */
    public function getTotalAttribute()
    {
        return $this->attributes['total'] = $this->progress();
    }

}
