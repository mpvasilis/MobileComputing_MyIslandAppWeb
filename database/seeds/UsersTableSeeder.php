<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'My Island Admin',
            'email' => 'admin@vasilis.pw',
            'password' => bcrypt('admin'),
        ]);
    
    }
}
