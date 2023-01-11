<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
	use SoftDeletes;
	protected $fillable = [
			'name',
			'stock',
			'brand',
			'buy_price', //denda
			'sale_price',
			'comment' //tata tertib
	];
	//protected $primaryKey = 'products_id';
    protected $table = 'products';    
	protected $dates = ['deleted_at'];
	
	public function suppliers() {
		return $this->belongsTo('App\Models\Suppliers');
		return $this->belongsToMany('App\Models\Suppliers');
	}
    use HasFactory;
    protected $guarded = ['id'];
}