<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Appreciation_trajet extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'T_APPRECIATION_TRAJET';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['trajet_id','user_id','valeurAppreciation'];

    public function user()
    {
        return $this->belongsTo('App\Trajet');
    }
}
