<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name',
        'stock',
        'brand',
        'buy_price', // denda
        'sale_price',
        'comment' // tata tertib
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function suppliers()
    {
        return $this->belongsTo(SupplierModel::class, 'suppliers_id');
    }

    public function transactions()
    {
        return $this->hasMany(TransactionModel::class, 'products_id');
    }
}
