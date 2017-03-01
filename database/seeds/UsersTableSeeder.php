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
            'sexo' => 'Hombre',
            'direccion' => 'Calle 1. Av. 1, Caracas',
            'email' => 'admin@sistema.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Default',
            'apellido'=>'Medico',
            'cedula'=> '2',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Mujer',
            'direccion' => 'Calle 1. Av. 3, Caracas',
            'email' => 'default@medico.com',
            'especialidad' => 'Cardiologo',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Default',
            'apellido'=>'Farmaceuta',
            'cedula'=> '3',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 5. Av. 8, Caracas',
            'email' => 'default@farmaceuta.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Default',
            'apellido'=>'Secretaria',
            'cedula'=> '4',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Mujer',
            'direccion' => 'Calle 9. Av. 7, Caracas',
            'email' => 'default@secretaria.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Default',
            'apellido'=>'User',
            'cedula'=> '1',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 2. Av. 3, Caracas',
            'email' => 'default@user.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Defaulterino',
            'apellido'=>'Userino',
            'cedula'=> '123',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 2. Av. 3, Caracas',
            'email' => 'defaulterino@userino.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Loremito',
            'apellido'=>'Usuarito',
            'cedula'=> '987',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 2. Av. 3, Caracas',
            'email' => 'default@loremito.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Manuel',
            'apellido'=>'Diaz',
            'cedula'=> '23685794',
            'fecha_nacimiento' => '1000-01-01',
            'sexo' => 'Hombre',
            'direccion' => 'Calle 2. Av. 3, Caracas',
            'email' => 'default@diaz.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
