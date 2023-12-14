<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    public function collection()
    {
        return Products::all();
    }
}
