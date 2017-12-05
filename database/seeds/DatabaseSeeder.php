<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = [
            [
                'lastname'      => 'account',
                'firstname'     => 'admin',
                'username'      => 'admin',
                'email'         => 'dostcaraga@gmail.com',
                'password'      => bcrypt('dostcaraga'),
                'user_level'    => 5,
                'status'        => 1,
                '__is'          => 1,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
