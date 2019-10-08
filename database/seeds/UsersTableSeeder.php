<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@laraspace.in',
            'name' => 'Jane Doe',
            'role' => 'admin',
            'password' => bcrypt('admin@123')
        ]);

        User::create([
            'email' => 'shane@laraspace.in',
            'name' => 'Shane White',
            'role' => 'user',
            'password' => bcrypt('hank@123')
        ]);

        User::create([
            'email' => 'logovimike@gmail.com',
            'name' => 'Mike Logovi',
            'role' => 'admin',
            'password' => bcrypt('123456')
        ]);
       
    }
}
