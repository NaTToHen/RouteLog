<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nome' => 'admin',
            'email' => 'admin@hotmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
