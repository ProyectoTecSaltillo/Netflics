<?php

namespace Netflics\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credencial extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credenciales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fin_vigencia', 'user_id'
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

    public static function agregarSuscripcion($cantidad, $tipo, $user)
    {
    	if (! $user->credencial) {

    		$credencial = new Credencial();

    		$credencial->fin_vigencia = $user->created_at->addMonth();

    		$credencial->user_id = $user->id;

    		$credencial->save();

    		$user->credencial()->associate($credencial->id)->save();

    	} else {

	    	$now = Carbon::now();

	    	switch ($tipo) {
	    		case 'semana':
	    			$now->addWeeks($cantidad);
	    			break;
	    		case 'mes':
	    			$now->addMonths($cantidad);
	    			break;
	    		case 'año':
	    			$now->addYears($cantidad);
	    			break;

	    		default:
	    			# code...
	    			break;
	    	}

	    	$credencial = $user->credencial;

	    	$credencial->fin_vigencia = $now;

	    	$credencial->update();

	    }
    }

    public function fechaVencimiento($date)
	{
    	$date = Carbon::now()->diffInDays(Carbon::parse($date));

    	if ($date <= 0) {
    		return "Vencida";
    	} else {
    		return "En {$date} días";
    	}
	}
}
