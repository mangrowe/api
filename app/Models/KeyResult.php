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
        'boolean' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'objective_id', 'user_id', 'title', 'description', 'type', 
        'criteria', 'initial', 'current', 'target', 'done', 'format',
    ];

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
}
