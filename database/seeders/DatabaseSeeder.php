<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin12345'),
            'recover_password'=>'admin12345',
            'address'=>'Yangon',
            'role'=>'admin',
            'phone'=>'09445068826',
            'gender'=>'male',
            'nrc'=>'12/mgdn188619',
        ]);
    }
}
