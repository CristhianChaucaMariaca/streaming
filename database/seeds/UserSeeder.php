<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => "Cristhian Chauca",
            'email' => "cristhiancchm@gmail.com",
            'password' => Hash::make('password')
        ]);

        $user->assignRole('Super-Admin');

        $user = User::create([
            'name'  => "Marlete Ergueta",
            'email' => "me@gmail.com",
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => "Alvaro Ergueta",
            'email' => "ae@gmail.com",
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('Administrator');
    }
}
