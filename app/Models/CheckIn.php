<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    /**
     * Confidance low level number.
     * 
     * @var int
     */
    const LOW = 1;

    /**
     * Confidance medium level number.
     * 
     * @var int
     */
    const MEDIUM = 2;

    /**
     * Confidance high level number.
     * 
     * @var int
     */
    const HIGH = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key_result_id', 'user_id', 'previous', 
        'current', 'confidance','description',
    ];

    /**
     * The key result associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keyResult()
    {
        return $this->belongsTo(KeyResult::class);
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
