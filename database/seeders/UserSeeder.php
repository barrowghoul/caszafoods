<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default credentials
        $user = User::create([
            'name' => 'Daniel',
            'email' => 'carlos.hernandez@seikosoluciones.com',
            'email_verified_at' => now(),
            'job_position' => 'Developer',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
    ]);
    $user->assignRole('Compras');

    $user = User::create([
        'name' => 'Omar',
        'email' => 'omar.garcia@seikosoluciones.com',
        'email_verified_at' => now(),
        'job_position' => 'Gerente Compras',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    $user->assignRole('Administrador');

    $user = User::create([
        'name' => 'Nestor',
        'email' => 'nestor.barcenas@seikosoluciones.com',
        'job_position' => 'Gerente Ventas',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    $user->assignRole('Administrador');

    $user = User::create([
        'name' => 'Gabriela Cantú',
        'email' => 'gabriela@caszafoods.com.mx',
        'email_verified_at' => now(),
        'job_position' => 'Director General',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    $user->assignRole('Administrador');

    $user = User::create([
        'name' => 'Samuel Ramos',
        'email' => 'sramos@carnesramos.com.mx',
        'email_verified_at' => now(),
        'job_position' => 'Director General',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    $user->assignRole('Administrador');

    $user = User::create([
        'name' => 'Administración Caszafoods',
        'email' => 'administracion@caszafoods.com.mx',
        'email_verified_at' => now(),
        'job_position' => 'Director General',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    $user->assignRole('Administrador');
    }
}
