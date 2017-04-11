<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Appreciation_user extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'T_APPRECIATION_USER';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id','valeurAppreciation'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
