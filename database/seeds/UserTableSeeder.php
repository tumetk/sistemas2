<?php

use Illuminate\Database\Seeder;
use \DB as DB;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'       => 'admin',
            'email'      => 'admin@admin.com',
            'password'   => bcrypt('secret'),
            'created_at' => date('y-m-d-h-i-s',time())
        ]);

        DB::table('servicios')->insert([
            'detalle'    => 'servicio lavado rapido',
            'precio'     => 100,
            'url'        => 'lavado.jpg',
            'created_at' => date('y-m-d-h-i-s',time())
        ]);

        DB::table('servicios')->insert([
            'detalle'    => 'servicio lavado completo',
            'precio'     => 100,
            'url'        => 'lavado.jpg',
            'created_at' => date('y-m-d-h-i-s',time())
        ]);

        DB::table('servicios')->insert([
            'detalle'    => 'servicio lavado basico',
            'precio'     => 100,
            'url'        => 'lavado.jpg',
            'created_at' => date('y-m-d-h-i-s',time())
        ]);

        DB::table('productos')->insert([
            'descripcion'    => 'cera',
            'created_at' => date('y-m-d-h-i-s',time())
        ]);

        DB::table('productos')->insert([
            'descripcion'    => 'lavador',
            'created_at' => date('y-m-d-h-i-s',time())
        ]);

        DB::table('productos')->insert([
            'descripcion'    => 'silicona',
            'created_at' => date('y-m-d-h-i-s',time())
        ]);


        DB::table('proveedores')->insert([
            'descripcion' => 'general',
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);
        
        DB::table('proveedores')->insert([
            'descripcion' => 'repuesto',
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);


        DB::table('almacen')->insert([
            'precio'  => 10.2,
            'producto_id'  => 1,
            'proveedor_id' => 1,
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);

        DB::table('almacen')->insert([
            'precio'  => 10.2,
            'producto_id'  => 1,
            'proveedor_id' => 2,
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);

        DB::table('almacen')->insert([
            'precio'  => 10.2,
            'producto_id'  => 2,
            'proveedor_id' => 1,
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);

        DB::table('almacen')->insert([
            'precio'  => 10.2,
            'producto_id'  => 2,
            'proveedor_id' => 2,
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);
        DB::table('almacen')->insert([
            'precio'  => 10.2,
            'producto_id'  => 3,
            'proveedor_id' => 1,
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);

        DB::table('almacen')->insert([
            'precio'  => 10.2,
            'producto_id'  => 3,
            'proveedor_id' => 2,
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);


        DB::table('citas')->insert([

            'servicios_id' => 1,
            'turno'       =>  date('y-m-d-h-i-s',time()),
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);

        DB::table('citas')->insert([

            'servicios_id' => 2,
            'turno'       =>  date('y-m-d-h-i-s',time()),
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);

        DB::table('citas')->insert([

            'servicios_id' => 3,
            'turno'       =>  date('y-m-d-h-i-s',time()),
            'created_at' => date('y-m-d-h-i-s',time()),
        ]);


        
    }
}
