<?php

use Illuminate\Database\Seeder;

class PatologiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patologias')->insert([
            'nombre' => 'Hipertension Arterial',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
