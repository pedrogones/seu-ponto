<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::query()->insert([
            [
                'name' => 'post_view'
            ],
            [
                'name' => 'post_create'
            ],
            [
                'name' => 'post_update'
            ],
            [
                'name' => 'post_delete'
            ],
            [
                'name' => 'user_view'
            ],
            [
                'name' => 'user_create'
            ],
            [
                'name' => 'user_update'
            ],
            [
                'name' => 'user_delete'
            ]
        ]);
    }
}
