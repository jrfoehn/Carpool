<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'T_TRAJET';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['villeDepartTrajet', 'villeArriveeTrajet', 'dateDebutTrajet', 'nbPlacesTrajet', 'pppTrajet', 'idConducteurTrajet','heureDepartTrajet'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	public function passagers()
	{
		return $this->belongsToMany('App\User');
	}
	
	public function note(){
		return $this->hasMany('App\Appreciation_trajet');
	}
}
