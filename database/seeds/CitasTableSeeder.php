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
            'especialidad_id' => '2',
            'fecha_cita' => '18/04',
            'hora' => '12:30 AM',
            'observaciones' => 'Cita Por Default',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
