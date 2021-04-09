<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'coordinator',
            'email' => 'coordinator@gmail.com',
            'password' =>Hash::make('12345678'),
            'regno' => '0',
            'section'=>'0',
            'department'=>'0',
            'semester'=>'0',
            'role_id'=>2,

        ]);
    }
}
