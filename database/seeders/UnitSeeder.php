<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit = Unit::create([
            'name' => 'N/A',
            'symbol' => 'N/A',
        ]);

        $unit = Unit::create([
            'name' => 'Kilo',
            'symbol' => 'Kg',
        ]);

        $unit = Unit::create([
            'name' => 'Gramo',
            'symbol' => 'gr',
        ]);

        $unit = Unit::create([
            'name' => 'Litro',
            'symbol' => 'Lts',
        ]);

        $unit = Unit::create([
            'name' => 'Pieza',
            'symbol' => 'Pza',
        ]);

        $unit = Unit::create([
            'name' => 'Galón',
            'symbol' => 'Gal',
        ]);

        $unit = Unit::create([
            'name' => 'Porron',
            'symbol' => 'Por',
        ]);

        $unit = Unit::create([
            'name' => 'Millar',
            'symbol' => 'Mil',
        ]);

        $unit = Unit::create([
            'name' => 'Rollo',
            'symbol' => 'Rol',
        ]);

        $unit = Unit::create([
            'name' => 'Caja',
            'symbol' => 'Caja',
        ]);

        $unit = Unit::create([
            'name' => 'Saco',
            'symbol' => 'Saco',
        ]);

        $unit = Unit::create([
            'name' => 'Par',
            'symbol' => 'Par',
        ]);

        $unit = Unit::create([
            'name' => 'Paquete',
            'symbol' => 'Paq',
        ]);

        $unit = Unit::create([
            'name' => 'Bolsa',
            'symbol' => 'Bol',
        ]);

        $unit = Unit::create([
            'name' => 'Garrafón',
            'symbol' => 'Garr',
        ]);

        $unit = Unit::create([
            'name' => 'Cubeta',
            'symbol' => 'Cub',
        ]);
    }
}
