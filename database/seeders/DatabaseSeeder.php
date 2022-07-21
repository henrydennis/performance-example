<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pen;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(100)
             ->has(Pen::factory()->count(10), 'pens')
             ->create();

         User::factory()
             ->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
    }
}
