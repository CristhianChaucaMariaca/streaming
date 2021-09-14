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
            'user_id'=> 3,
            'name' => 'Ergueta',
            'status' => 'enable',
            'payday' => 13,
            'members' =>5
        ]);
        Group::create([
            'user_id' => 2,
            'name' => 'Montes',
            'status' => 'enable',
            'payday' => 20,
            'members' => 4
        ]);
    }
}
