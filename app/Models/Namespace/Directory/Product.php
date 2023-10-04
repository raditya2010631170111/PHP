<?php

namespace App\Models\Namespace\Directory;

use App\Models\Namespace\Directory\Product as BaseProduct;

class ProductModel extends BaseProduct
{
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name',
        'stock',
        'brand',
        'buy_price',
        'sale_price',
        'comment'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
