<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    /**
     * The table associated with the model (because we were silly and didn't call these employees!).
     *
     * @var string
     */
    protected $table = 'personnel';

    //No timestamps in db
    public $timestamps = false;

    //As we're using a non standard key, adjust accordingly
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = ['first_name', 'last_name', 'job_title', 'dept_id', 'tel_no'];

    //Get the department the person is in
    public function department()
    {
        return $this->belongsTo('Helpdesk\Department', 'dept_id');
    }

    //Get the specialisms of the person (if any)
    public function specialisms()
    {
        return $this->hasManyThrough(
            'Helpdesk\ProblemType', //model desired (in this case problem type as we have a specialism in a particular type of problem)
            'Helpdesk\Specialism', //intermediate model (in this case specialism as that table links personnel to problem types)
            'person_id', //foreign key on specialisms table (specialisms.person_id represents a person)
            'id', //foreign key on problem_types table
            'id', //local key on personnel table
            'specialism' //local key on specialisms
        );
    }

    //Get the problems the person has been assigned to (if any)
    public function problems()
    {
        return $this->hasMany('Helpdesk\Problem', 'specialist');
    }

    //Get the user associated with this person (if any)
    public function user()
    {
        return $this->hasOne('Helpdesk\User', 'username');
    }
}
