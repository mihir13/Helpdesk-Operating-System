<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Specialism extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'specialists';

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
    protected $fillable = ['person_id', 'specialism'];

    /**
     * Get the person the specialism belongs to
     */
    public function person()
    {
        return $this->belongsTo('Helpdesk\Person');
    }

    /**
     * Get the problem type the specialism belongs to
     */
    public function problemType()
    {
        return $this->belongsTo('Helpdesk\ProblemType', 'specialism');
    }
}
