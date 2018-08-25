<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
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
        'organization_id', 'parent_id', 'level', 'title',
        'description', 'start_at', 'end_at',
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
}
