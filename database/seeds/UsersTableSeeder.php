<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Administrador',
            'apellido'=>'Sistema',
            'cedula'=> '0',
            'fecha_nacimiento' => '1000-01-01',
            'edad' => '18',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 1. Av. 1, Caracas',
            'email' => 'admin@sistema.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Default',
            'apellido'=>'User',
            'cedula'=> '1',
            'fecha_nacimiento' => '1000-01-10',
            'edad' => '20',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 2. Av. 3, Caracas',
            'email' => 'default@user.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
