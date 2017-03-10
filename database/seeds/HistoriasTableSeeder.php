<?php

use Illuminate\Database\Seeder;

class HistoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historials')->insert([
            'paciente_id' => '12',
            'especialidad_id' => '2',
            'medico_id' => '3',
            'cita_id' => '1',
            'informe' => 'El Paciente muere a la mitad xD',
            'receta' => '10 porciones de DefaultMedicina!',
            'observaciones' => 'La autopsia salio muy bien :D',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
