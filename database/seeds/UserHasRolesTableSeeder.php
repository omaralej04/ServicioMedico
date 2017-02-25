<?php

use Illuminate\Database\Seeder;

class UserHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_has_roles')->insert([
            'role_id' => 1,
           'user_id' => 1,
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => 2,
            'user_id' => 2,
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => 3,
            'user_id' => 3,
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => 4,
            'user_id' => 4,
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => 5,
            'user_id' => 5,
        ]);
    }
}
