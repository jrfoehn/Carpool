<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'T_VEHICULE';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['couleurVehicule', 'marqueVehicule', 'nomVehicule', 'dateMiseEnService', 'nbPlacesVehicule','user_id'];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
