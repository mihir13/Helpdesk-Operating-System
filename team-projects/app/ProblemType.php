<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'problem_types';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = ['parent', 'name'];

    /**
     * Get the parent problem
     */
    public function parent()
    {
        return $this->belongsTo('Helpdesk\ProblemType', 'parent');
    }

    /**
     * Get the specialists for this type of problem
     */
    public function specialists()
    {
        return $this->hasManyThrough(
            'Helpdesk\Person',
            'Helpdesk\Specialism',
            'specialism',
            'id',
            'id',
            'person_id'
        );
    }

    /**
     * Get the problems with this type
     */
    public function problems()
    {
        return $this->hasMany('Helpdesk\Problem', 'type');
    }
}
