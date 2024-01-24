<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tax = Tax::create([
            'name' => 'Sin IVA'
        ]);

        $tax = Tax::create([
            'name' => 'IVA',
            'factor' => 16
        ]);
    }
}
