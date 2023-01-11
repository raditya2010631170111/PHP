<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use HasApiTokens, HasFactory, Notifiable;
	protected $fillable = [
			'name',
			'no_hp',
			'foto_profil',
			'alamat'
	];
    use SoftDeletes;
    protected $table = 'users'; //apabila nama model beda nama migrate   
   	protected $dates = ['deleted_at']; 
	
	public function playstations() {
		return $this->hasOne('App\Playstations');
		return $this->hasMany('App\Playstations');
		return $this->belongsToMany('App\Playstations');
	}
	
	use HasFactory;
	protected $guarded = ['id'];
	protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}