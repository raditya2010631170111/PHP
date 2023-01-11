<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suppliers extends Model
{
	protected $fillable = [
			'name',
			'name_company',
			'kota',
			'telp',
			'contact',
			'information' 
	];
    use SoftDeletes;
	protected $primaryKey = 'supplier_id';
    protected $table = 'suppliers'; //apabila nama model beda nama migrate   
   	protected $dates = ['deleted_at']; 
	
	public function products() {
		return $this->hasOne('App\Models\Products');
		return $this->hasMany('App\Models\Products');
		return $this->belongsToMany('App\Models\Products');
	}
}