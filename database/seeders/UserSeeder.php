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
        User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'role' => 'admin',
            'password' => bcrypt('admin123')
        ]);
        User::create([
            'name' => 'petugas',
            'email' => 'petugas@app.com',
            'role' => 'petugas',
            'password' => bcrypt('petugas123')
        ]);
    }
}
