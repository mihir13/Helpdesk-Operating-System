<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'serial_nos';

    /**
     * Disable timestamp columns
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Key column name
     *
     * @var string
     */
    protected $primaryKey = 'serial_no';

    /**
     * Disable incrementing nature of key
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Set key type to string
     *
     * @var string
     */
    public $keyType = 'string';

    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = ['serial_no', 'hardware_id'];

    /**
     * Get hardware type of this serial number
     */
    public function hardware()
    {
        return $this->belongsTo('Helpdesk\Hardware');
    }
}
