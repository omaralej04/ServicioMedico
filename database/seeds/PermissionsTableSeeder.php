<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        DB::table('permissions')->insert([
           'name' => 'ReadUsers',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateUsers',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateUsers',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteUsers',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Medicos
        DB::table('permissions')->insert([
            'name' => 'ReadMedicos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateMedicos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateMedicos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteMedicos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Farmaceutas
        DB::table('permissions')->insert([
            'name' => 'ReadFarmaceutas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateFarmaceutas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateFarmaceutas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteFarmaceutas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Secretarias
        DB::table('permissions')->insert([
            'name' => 'ReadSecretarias',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateSecretarias',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateSecretarias',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteSecretarias',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Medicinas
        DB::table('permissions')->insert([
            'name' => 'ReadMedicinas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateMedicinas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateMedicinas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteMedicinas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Roles
        DB::table('permissions')->insert([
            'name' => 'ReadRoles',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateRoles',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateRoles',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteRoles',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Permisos
        DB::table('permissions')->insert([
            'name' => 'ReadPermisos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreatePermisos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdatePermisos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeletePermisos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Especialidades
        DB::table('permissions')->insert([
            'name' => 'ReadEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        //Citas
        DB::table('permissions')->insert([
            'name' => 'ReadCitas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'CreateCitas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateCitas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'DeleteCitas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
