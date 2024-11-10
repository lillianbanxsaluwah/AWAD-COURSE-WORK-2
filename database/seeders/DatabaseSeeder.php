<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DashboardSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            LevelSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
