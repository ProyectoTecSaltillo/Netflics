<?php

namespace Netflics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Pelicula relationship
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function peliculas()
    {
        return $this->hasMany('Netflics\Models\Pelicula');
    }
}
