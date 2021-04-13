<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'CR',
            'email' => 'cr@gmail.com',
            'password' =>Hash::make('12345678'),
            'regno' => 'FA17-CS-133',
            'section'=>'E',
            'department'=>'CS',
            'semester'=>'8th',
            'role_id'=>1,

        ]);
    }
}
