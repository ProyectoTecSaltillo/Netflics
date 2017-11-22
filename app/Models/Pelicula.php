<?php

namespace Netflics\Models;

use Illuminate\Database\Eloquent\Model;
use Netflics\Models\Inventario;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelicula extends Model
{
    use SoftDeletes;
    
    const DISPONIBLE = 1;
    const VENDIDA = 2;
    const RENTADA = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'precio_renta', 'precio_venta', 'categoria_id', 'genero_id', 'cover', 'descripcion'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Categoria relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('Netflics\Models\Categoria');
    }

    /**
     * Estatus relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function estatus()
    {
        return $this->belongsTo('Netflics\Models\Estatus');
    }

    /**
     * Genero relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function genero()
    {
        return $this->belongsTo('Netflics\Models\Genero');
    }

    /**
     * Inventario relationship
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function inventario()
    {
        return $this->hasMany('Netflics\Models\Inventario');
    }

    /**
     * Inserta copias de la pelicula al inventario
     * @return
     */
    public function llenarInventario($copias, $id)
    {
        for ($i=0; $i<$copias; $i++) {

            $inventario = new Inventario();
            
            $inventario->pelicula_id = $id;
            $inventario->estatus_id = self::DISPONIBLE;

            $inventario->pelicula()->associate($id);
            $inventario->estatus()->associate(self::DISPONIBLE);

            $inventario->save();
        }
    }

    /**
     * Checa las copias del inventario que no estén rentadas
     * @return boolean
     */
    public function checarInventario($pelicula)
    {
        $puedeEliminar = true;

        foreach ($pelicula->inventario as $inv) {
            if ($inv->estatus_id == self::RENTADA) {
                $puedeEliminar = false;
            }
        }

        return $puedeEliminar;
    }

    /**
     * Elimina las copias de la pelicula del inventario
     * @return
     */
    public function eliminarInventario($pelicula)
    {   
        foreach ($pelicula->inventario as $inv) {
            $inv->pelicula()->dissociate($pelicula->id);
            $inv->estatus()->dissociate($pelicula->estatus_id);

            $inv->delete();
        }
    }
}
