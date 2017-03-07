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
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'especialidad_id' => '1',
        ]);

        DB::table('users')->insert([
            'nombre' => 'Omar',
            'apellido'=>'Diaz',
            'cedula'=> '5579723',
            'fecha_nacimiento' => '1965-07-07',
            'sexo' => 'Hombre',
            'direccion' => 'Los Dos Caminos, Caracas',
            'email' => 'odiazespinel@gmail.com',
            'telefono' => '02122861098',
            'celular' => '04149106930',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'especialidad_id' => '4',
        ]);

        DB::table('users')->insert([
            'nombre' => 'Gladys',
            'apellido'=>'Rangel',
            'cedula'=> '5591020',
            'fecha_nacimiento' => '1965-03-15',
            'sexo' => 'Mujer',
            'direccion' => 'Los Dos Caminos, Caracas',
            'email' => 'gmrr60@hotmail.com',
            'celular' => '04146055665',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'especialidad_id' => '4',
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
            'nombre' => 'Juan',
            'apellido'=>'Penules',
            'cedula'=> '6578945',
            'fecha_nacimiento' => '1980-10-15',
            'sexo' => 'Hombre',
            'direccion' => 'Calle Los Palitos, Caracas',
            'email' => 'juan@gmail.com',
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
            'nombre' => 'Maria',
            'apellido'=>'Segul',
            'cedula'=> '21345102',
            'fecha_nacimiento' => '1995-08-22',
            'sexo' => 'Mujer',
            'direccion' => 'Las palmas y media, Caracas',
            'email' => 'maria@protonmail.com',
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
            'nombre' => 'Omar',
            'apellido'=>'Diaz',
            'cedula'=> '27978092',
            'fecha_nacimiento' => '2001-04-18',
            'sexo' => 'Hombre',
            'direccion' => 'Los Dos Caminos, Caracas',
            'email' => 'o_ma_rdiaz@hotmail.com',
              'celular' => '04149161590',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Manuel',
            'apellido'=>'Diaz',
            'cedula'=> '23685794',
            'fecha_nacimiento' => '1995-07-07',
            'sexo' => 'Hombre',
            'direccion' => 'Los Dos Caminos, Caracas',
            'email' => 'manudiaz95@hotmail.com',
            'telefono' => '02122861098',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Pablo',
            'apellido'=>'Niseron',
            'cedula'=> '9354623',
            'fecha_nacimiento' => '1992-12-14',
            'sexo' => 'Hombre',
            'direccion' => 'La Castellana, Caracas',
            'email' => 'pablox12@yahoo.com',
            'password' => bcrypt('az0909az'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

    }
}
