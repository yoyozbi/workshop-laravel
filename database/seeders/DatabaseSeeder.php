<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::truncate();

        \App\Models\User::factory(10)->create();

        $this->call([
            BookSeeder::class,
        ]);
    }
}
