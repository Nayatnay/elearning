<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);
        
        User::factory()->create([
            'name' => 'Programador',
            'doc' => '0000000',
            'email' => 'nayatnay@gmail.com',
            'password' => '00000000',
        ])->assignRole('Admin');

        Storage::disk('public')->deleteDirectory('cursos');
        Storage::disk('public')->makeDirectory('cursos');

        Curso::factory(2)->create();


    }
}
