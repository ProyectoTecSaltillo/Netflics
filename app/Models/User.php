<?php

namespace Netflics\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const ADMIN_ROLE = 1;
    const EMPLOYEE_ROLE = 2;
    const CLIENT_ROLE = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'paterno', 'materno', 'rol_id', 'telefono', 'direccion', 'foto', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Role relationship
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function rol()
    {
        return $this->belongsTo('Netflics\Models\Rol');
    }

    /**
     * Get user's full name
     * @return string
     */
    public function getNombreCompletoAttribute()
    {
        return ucwords("{$this->nombres} {$this->paterno} {$this->materno}");
    }

    /**
     * Check if the logged user is an admin
     * @return boolean
     */
    public static function esAdministrador()
    {
        if(Auth::check())
            return Auth::user()->rol_id == self::ADMIN_ROLE ? true : false;

        return false;
    }

    /**
     * Check if the logged user is an employee
     * @return boolean
     */
    public static function esEmpleado()
    {
        if(Auth::check())
            return Auth::user()->rol_id == self::EMPLOYEE_ROLE ? true : false;

        return false;
    }

    /**
     * Check if the logged user is a client
     * @return boolean
     */
    public static function esCliente()
    {
        if(Auth::check())
            return Auth::user()->rol_id == self::CLIENT_ROLE ? true : false;

        return false;
    }

    /**
     * Credencial relationship
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function credencial()
    {
        return $this->hasOne('Netflics\Models\Credencial');
    }
}
