<?php

namespace App\Imports;

use App\Models\Playstations;
use Maatwebsite\Excel\Concerns\ToModel;

class PlaystationsImport implements ToModel
{
    public function model(array $row)
    {
        return new Playstations([
			'name' => $row[1],
			'rental_price' => $row[2],
			'denda' => $row[3],
			'tata_tertib' => $row[4],
        ]);
    }
}
