<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class ProblemSoftware extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'problems_software';

    /**
     * Disable timestamp columns
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Disable incrementing nature of key
     *
     * @var boolean
     */
    public $incrementing = false;

    protected $fillable = ['os', 'software', 'id'];


}
