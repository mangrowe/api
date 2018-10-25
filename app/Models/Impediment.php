<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impediment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'receiver_id', 'key_result_id', 'parent_id', 
        'status', 'description', 'archive',
    ];

    /**
     * The user associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The receiver associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * The keyResult associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keyResult()
    {
        return $this->belongsTo(KeyResult::class);
    }

    /**
     * The parent associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Impediment::class, 'parent_id');
    }

    /**
     * The children associated with.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Impediment::class, 'parent_id');
    }
}
