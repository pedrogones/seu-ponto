<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin= User::query()->create([
            'name'=>'Super Admin',
            'email'=>'super@gmail.com',
            'password'=>'1234'
        ]);
        $superAdmin->roles()->attach(1);

        $admin = User::query()->create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>'1234'
        ]);
        $admin->roles()->attach(2);

        $user = User::query()->create([
            'name'=>'Usuário',
            'email'=>'user@gmail.com',
            'password'=>'1234'
        ]);
        $user->roles()->attach(3);

        $author = User::query()->create([
            'name'=>'Autor',
            'email'=>'autor@gmail.com',
            'password'=>'1234'
        ]);
        $author->roles()->attach(4);

    }
}
