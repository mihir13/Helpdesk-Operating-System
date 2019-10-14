<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //No timestamps in db
    public $timestamps = false;

    protected $fillable = ['type', 'description', 'solution', 'solved', 'completed', 'specialist'];

    /**
     * Get problem type
     */
    public function problemType()
    {
        return $this->belongsTo('Helpdesk\ProblemType', 'type');
    }

    /**
     * Get assigned specialist
     */
    public function specialist()
    {
        return $this->belongsTo('Helpdesk\Person', 'specialist');
    }

    /**
     * Get problem hardware
     */
    public function problemHardware()
    {
        return $this->hasOne('Helpdesk\ProblemHardware', 'id');
    }

    /**
     * Get problem software
     */
    public function problemSoftware()
    {
        return $this->hasOne('Helpdesk\ProblemSoftware', 'id');
    }

    /**
     * hardware or software as string,  returns 'Hardware' or 'Software' or ''
     */
    public function typeString()
    {
        if($this->problemSoftware()->exists())
        {
            return 'Software';
        }
        elseif($this->problemHardware()->exists())
        {
            return 'Hardware';
        }
        return '';
    }
}
