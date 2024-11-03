<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Pasien;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Pasien::factory(10)->create();

        Admin::create([
            'nama' => 'Admin',
            'email' => 'admin@example',
            'password' => Hash::make('password'),
        ]);
    }
}
