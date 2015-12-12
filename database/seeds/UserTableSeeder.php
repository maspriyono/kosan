<?php

use Illuminate\Database\Seeder,
    App\Http\Helpers\Base;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'address'   => 'address example',
            'registration_number' => '123456',
            'password'  => Base::hashInput('admin')
        ]);

        DB::table('roles')->insert([
            'name'      => 'admin'
        ]);

        DB::table('roles')->insert([
            'name'      => 'attendant'
        ]);

        DB::table('roles')->insert([
            'name'      => 'owner'
        ]);

        DB::table('user_roles')->insert([
            'user_id'      => 1,
            'role_id'      => 1
        ]);

        DB::table('houses')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
