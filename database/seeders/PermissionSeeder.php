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
                'name' => 'post_view',
                'label'=>'Ver posts'
            ],
            [
                'name' => 'post_create',
                'label' => 'Criar posts'
            ],
            [
                'name' => 'post_update',
                'label' => 'Atualizar posts'
            ],
            [
                'name' => 'post_delete',
                'label' => 'Apagar posts'
            ],
            [
                'name' => 'user_view',
                'label' => 'Ver usuários'
            ],
            [
                'name' => 'user_create',
                'label' => 'Cadastrar usuários'
            ],
            [
                'name' => 'user_update',
                'label' => 'Atualizar usuários'
            ],
            [
                'name' => 'user_delete',
                'label' => 'Apagar usuários'
            ]
        ]);
    }
}
