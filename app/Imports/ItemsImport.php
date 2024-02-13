<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ItemsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'name' => $row['nombre'],
            'code' => $row['codigo'],
            'cost' => $row['costo'],
            'min' => $row['minimo'],
            'max' => $row['maximo'],
            'on_hand' => $row['existencia'],
            'family_id' => $row['familia'],
            'unit_id' => $row['unidad'],
            'tax_id' => $row['impuesto'],
            'is_service' => $row['servicio'],
            'ieps' => $row['ieps'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'codigo' => 'required',
            'costo' => 'numeric',
            'minimo' => 'numeric',
            'maximo' => 'numeric',
            'existencia' => 'numeric',
            'familia' => 'numeric',
            'unidad' => 'numeric',
            'impuesto' => 'numeric',
            'servicio' => 'boolean',
            'ieps' => 'numeric',
        ];
    }
}
