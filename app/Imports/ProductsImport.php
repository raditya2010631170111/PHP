<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    public function model(array $row)
    {
        return new Products([
			'name' => $row[1],
			'buy_price' => $row[2],
			'sale_price' => $row[3],
			'comment' => $row[4],
        ]);
    }
}
