<?php

namespace App\Imports;

use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class VendorsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        \Log::info($row); // Log the row data

        return new Vendor([
            'name' => $row['nombre'],
            'tax_id' => $row['rfc'],
            'address' => $row['direccion'],
            'contact' => $row['contacto'],
            'phone' => $row['telefono'],
            'email' => $row['email'],
            'pay_days' => $row['dias_credito'],
            'delivery_time' => $row['tiempo_entrega'],
        ]);
    }

    public function rules() : array
    {
        return [
            'nombre' => 'required',
            'rfc' => 'required',
            'direccion' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'dias_credito' => 'required',
            'tiempo_entrega' => 'required',
        ];
    }
}
