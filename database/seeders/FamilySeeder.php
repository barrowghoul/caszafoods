<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $family = Family::create([
            'name' => 'Servicios',
        ]);

        $family = Family::create([
            'name' => 'Químicos',
        ]);

        $family = Family::create([
            'name' => 'Etiquetas Producto',
        ]);

        $family = Family::create([
            'name' => 'Etiquetas Caudcidad',
        ]);

        $family = Family::create([
            'name' => 'Empaque',
        ]);

        $family = Family::create([
            'name' => 'Equipo Limpieza',
        ]);

        $family = Family::create([
            'name' => 'Equipo de Cocina',
        ]);

        $family = Family::create([
            'name' => 'Condimentos',
        ]);

        $family = Family::create([
            'name' => 'Granos, Harinas y Aceites',
        ]);

        $family = Family::create([
            'name' => 'Conservadores',
        ]);

        $family = Family::create([
            'name' => 'Botanas',
        ]);

        $family = Family::create([
            'name' => 'Producto en Congelación',
        ]);

        $family = Family::create([
            'name' => 'Carnes y Embutidos',
        ]);

        $family = Family::create([
            'name' => 'Pasteurizados',
        ]);

        $family = Family::create([
            'name' => 'Verduras',
        ]);

        $family = Family::create([
            'name' => 'Crea Acida',
        ]);

        $family = Family::create([
            'name' => 'Enlatados y Condimentos',
        ]);

        $family = Family::create([
            'name' => 'Deshechables para Empleado',
        ]);

        $family = Family::create([
            'name' => 'Rational',
        ]);

        $family = Family::create([
            'name' => 'Sellos de Garantía',
        ]);

        $family = Family::create([
            'name' => 'Refacciones',
        ]);

        $family = Family::create([
            'name' => 'Contenedores',
        ]);

        $family = Family::create([
            'name' => 'Contenedores Etiquetados',
        ]);

        $family = Family::create([
            'name' => 'Bolsas',
        ]);

        $family = Family::create([
            'name' => 'Equipo de Seguridad',
        ]);

        $family = Family::create([
            'name' => 'Rollos Papel',
        ]);
    }
}
