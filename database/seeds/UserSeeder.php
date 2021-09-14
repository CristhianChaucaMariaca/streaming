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
            'name' => "Ruben Chente",
            'email' => "rc@gmail.com",
            'password' => Hash::make('password')
        ]);

        $user->assignRole('administrator');

        $user = User::create([
            'name' => "Alvaro Ergueta",
            'email' => "ae@gmail.com",
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('administrator');

        $user = User::create([
            'name'  => "Marlete Ergueta",
            'email' => "me@gmail.com",
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Monica Montes',
            'email' => "mm@gmailcom",
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Jacqueline Mariaca',
            'email' => 'jm@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Carlos Chauca',
            'email' => 'cch@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Ronald Alarcon',
            'email' => 'ra@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');


    }
}
