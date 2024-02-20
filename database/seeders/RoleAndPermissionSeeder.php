<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Crear Permisos
        Permission::create(['name' => 'ver roles', 'description' => 'Permite acceso a visualizar el listado de roels']);
        Permission::create(['name' => 'editar roles', 'description' => 'Permite editar roles, agregar quitar permisos']);
        Permission::create(['name' => 'crear roles', 'description' => 'Permite la creación de nuevos roles']);
        Permission::create(['name' => 'ver usuarios', 'description' => 'Permite acceso a visualizar el lsitado de usuarios']);
        Permission::create(['name' => 'crear usuarios', 'description' => 'Permite la creación de usuarios']);
        Permission::create(['name' => 'editar usuarios', 'description' => 'Permite modificar la información de perfiles de usuario']);
        Permission::create(['name' => 'suspender usuarios', 'description' => 'Permite suspender usuarios']);
        Permission::create(['name' => 'crear requisiciones', 'description' => 'Permite la creación de requisiciones']);
        Permission::create(['name' => 'ver requisiciones', 'description' => 'Permite la visualización de requisiciones']);
        Permission::create(['name' => 'crear oc', 'description' => 'Permite la creación de Ordenes de Compra']);
        Permission::create(['name' => 'ver oc', 'description' => 'Permite la visualización de Ordenes de Compra']);
        Permission::create(['name' => 'crear recepciones', 'description' => 'Permite la creación de recepciones de Ordenes de Compra']);
        Permission::create(['name' => 'ver recepciones', 'description' => 'Permite la visualización de recepciones de Ordenes de Compra']);
        permission::create(['name' => 'crear facturas', 'description' => 'Permite la creación de facturas de proveedores']);
        Permission::create(['name' => 'ver facturas', 'description' => 'Permite la visualización de facturas de proveedores']);
        Permission::create(['name' => 'ver articulos', 'description' => 'Permite la visualización de artículos del inventario']);
        Permission::create(['name' => 'crear articulos', 'description' => 'Permite la creación de artículos del inventario']);
        Permission::create(['name' => 'ver familias', 'description' => 'Permite la visualización de las familias de artículos']);
        Permission::create(['name' => 'crear familias', 'description' => 'Permite la creación de familias del inventario']);
        Permission::create(['name' => 'ver unidades', 'description' => 'Permite la visualización de las unidades de medida para los artículos']);
        Permission::create(['name' => 'crear unidades', 'description' => 'Permite la creación de las unidades de medida para los artículos']);
        Permission::create(['name' => 'crear compras', 'description' => 'Permite la creación de órdenes de compra']);
        Permission::create(['name' => 'importar items', 'description' => 'Permite la importación de articulos a la base de datos']);
        Permission::create(['name' => 'crear proveedores', 'description' => 'Permite la creación de proveedores']);
        Permission::create(['name' => 'ver proveedores', 'description' => 'Permite la visualización de proveedores']);
        Permission::create(['name' => 'importar proveedores', 'description' => 'Permite la importación de proveedores a la base de datos']);

        $role = Role::create(['name' => 'Administrador', 'description' => 'Acceso a todos los módulos del sistema, puede crear, editar y/o eliminar registros de sistema.'])->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'Compras', 'description' => 'Acceso al módulo de compras'])->givePermissionTo(['ver requisiciones', 'crear requisiciones', 'ver oc', 'crear oc']);
        $role = Role::create(['name' => 'Compras Admin', 'description' => 'Acceso al módulo de compras'])->givePermissionTo(['ver requisiciones', 'crear requisiciones', 'ver oc', 'crear compras', 'crear requisiciones', 'ver requisiciones', 'crear oc', 'ver oc', 'crear recepciones', 'ver recepciones', 'crear facturas', 'ver facturas']);
        $role = Role::create(['name' => 'Inventarios', 'description' => 'Acceso al módulo de inventario'])->givePermissionTo(['ver articulos', 'crear articulos', 'ver familias', 'crear familias', 'ver unidades', 'crear unidades', 'ver requisiciones', 'crear requisiciones', 'ver oc', 'crear oc', 'ver recepciones', 'crear recepciones', 'ver facturas', 'crear facturas']);
    }
}
