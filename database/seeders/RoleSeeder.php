<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()->create([
            'name'=>'Super Admin'
        ]);
        $admin = Role::query()->create([
            'name'=>'Admin'
        ]);
        $admin->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8]);
        $user=Role::query()->create([
            'name'=>'User'
        ]);
        $user->permissions()->attach(1);

        $author = Role::query()->create([
            'name'=>'Author'
        ]);
        $author->permissions()->attach([1, 2, 3, 4]);
    }
}
