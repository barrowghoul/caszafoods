<?php

namespace App\Imports;

use App\Models\Family;
use Maatwebsite\Excel\Concerns\ToModel;

class FamiliesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Family([
            'name' => $row['nombre'],
            'cost' => $row['costo'],
            'status' => $row['estado'],
        ]);
    }
}
