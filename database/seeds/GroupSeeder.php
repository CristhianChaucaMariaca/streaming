<?php

use Illuminate\Database\Seeder;

use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => 'Ergueta',
            'status' => 'enable',
            'payday' => 13,
        ]);
        Group::create([
            'name' => 'Montes',
            'status' => 'enable',
            'payday' => 20,
        ]);
    }
}
