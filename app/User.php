<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cmgmyr\Messenger\Traits\Messagable;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, Messagable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'admin', 'prenomUsers','telPortUsers','telFixeUsers', 'photoUsers','pseudoUsers','dateNaissanceUsers','vehiculeUsers'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}
	
	public function vehicule() 
	{
		return $this->hasOne('App\Vehicule');
	}

    public function trajets()
    {
		return $this->hasMany('App\Trajet','idConducteurTrajet');
    }
	
	public function trajetsPassager()
    {
		return $this->belongsToMany('App\Trajet');
    }
	
	public function notes()
    {
		return $this->hasMany('App\Appreciation_user');

	}
}