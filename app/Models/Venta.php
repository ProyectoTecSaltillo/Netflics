<?php

namespace Netflics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'empleado_id', 'inventario_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * User relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('Netflics\Models\User');
    }

    /**
     * User relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('Netflics\Models\User', 'empleado_id');
    }

    /**
     * Inventario relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function inventario()
    {
        return $this->belongsTo('Netflics\Models\Inventario');
    }
}
