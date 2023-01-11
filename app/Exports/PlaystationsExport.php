<?php

namespace App\Exports;

use App\Models\Playstations;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlaystationsExport implements FromCollection
{
    public function collection()
    {
        return Playstations::all();
    }
}
