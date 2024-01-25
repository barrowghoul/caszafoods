<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendor = Vendor::create([
            'name' => 'Seiko Soluciones',
            'address' => 'García Lorca 2008 Santa Cecilia, Apodaca N.L. C.P. 66636',
            'contact' => 'Omar García',
            'tax_id' => 'SEK123456CF74',
            'phone' => '8114887521',
            'email' => 'omar.garcia@seikosoluciones.com',
            'pay_days' => 15,
            'total' => 0,
            'balance' => 0,
        ]);

        $vendor = Vendor::create([
            'name' => 'Solinek',
            'address' => 'Thomas Elliot 656 Country, Guadalupe N.L.',
            'tax_id' => 'SEK123456CF74',
            'contact' => 'Erique Franco',
            'phone' => '8114887521',
            'email' => 'enrique@solinek.com',
            'pay_days' => 7,
            'total' => 0,
            'balance' => 0,
        ]);

        $vendor = Vendor::create([
            'name' => 'Danfoss Industries',
            'tax_id' => 'SEK123456CF74',
            'address' => 'Miguel Alemán 162, El Milagro Apodaca N.L.',
            'contact' => 'Marco Robledo',
            'phone' => '8181565600',
            'email' => 'marco@danfoss.com',
            'pay_days' => 15,
            'total' => 0,
            'balance' => 0,
        ]); 
    }
}
