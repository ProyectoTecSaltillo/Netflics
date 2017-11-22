<?php

namespace Netflics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pelicula_id', 'estatus_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Pelicula relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function pelicula()
    {
        return $this->belongsTo('Netflics\Models\Pelicula')->withTrashed();
    }

    /**
     * Estatus relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function estatus()
    {
        return $this->belongsTo('Netflics\Models\Estatus');
    }
}
