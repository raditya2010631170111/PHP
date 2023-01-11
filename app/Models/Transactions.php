<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    protected $fillable = [
			'purchase_id',
			'products_id',
			'suppliers_id',
			'stock',
			'rental_date',
			'return_date',
			'actual_return_date',
			'comment'
	];
    protected $table = 'transactions'; 
	protected $dates = ['deleted_at'];
	use SoftDeletes;
	use HasFactory;
    protected $guarded = ['id']; // protected $primaryKey = 'purchase_id';
}