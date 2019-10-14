<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The arrtributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the personnel in this department.
     */
    public function personnel()
    {
        return $this->hasMany('Helpdesk\Personnel', 'dept_id');
    }
}
