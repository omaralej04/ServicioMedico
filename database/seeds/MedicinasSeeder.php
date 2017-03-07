<?php

use Illuminate\Database\Seeder;

class MedicinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicinas')->insert([
            'nombre' => 'DefaultMedicina',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

//        DB::table('medicinas')->insert([
//            'nombre' => 'Clorace',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//        DB::table('medicinas')->insert([
//            'nombre' => 'Cataflam',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
    }
}
