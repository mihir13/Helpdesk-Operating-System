<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'software';

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
     * Get the problems that belong to this type of software
     */
    public function problems()
    {
        return $this->hasManyThrough(
            'Helpdesk\Problem',
            'Helpdesk\ProblemSoftware',
            'software',
            'id',
            'id',
            'id'
        );
    }
}
