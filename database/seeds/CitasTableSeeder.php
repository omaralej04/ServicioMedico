<?php

use Illuminate\Database\Seeder;

class CitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citas')->insert([
            'paciente_id' => '12',
            'especialidad_id' => '2',
            'medico_id' => '3',
            'fecha_cita' => '18/04',
            'hora' => '01:15 PM',
            'observaciones' => 'Cita Por Default',
            'status' => 'activa',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
