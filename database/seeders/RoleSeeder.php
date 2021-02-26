<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::create([
            'name'=>'cr',
            'description'=>'Cr role'
        ]);
        $role=Role::create([
            'name'=>'coordinator',
            'description'=>'coordinator role'
        ]);
        $role=Role::create([
            'name'=>'student',
            'description'=>'student role'
        ]);

    }
}
