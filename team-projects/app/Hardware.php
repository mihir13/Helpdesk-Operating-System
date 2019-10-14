<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hardware extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hardware';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = ['type', 'make', 'model'];

    /**
     * Get the serial numbers that belong to this type of hardware
     */
    public function serials()
    {
        return $this->hasMany('Helpdesk\SerialNumber', 'hardware_id');
    }

    /**
     * Get the problems that belong to this type of hardware
     */
    public function problems()
    {
        return $this->hasManyThrough(
            'Helpdesk\Problem',
            'Helpdesk\ProblemHardware',
            'hardware',
            'id',
            'id',
            'id'
        );
    }
}
