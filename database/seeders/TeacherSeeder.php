<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'name' => 'Jane Doe',
            'date_of_birth' => '2000-01-01', // Use a valid date format
            'gender' => 'Female',
            'address' => '123 Main Street, City, Country',
            'phone' => '123-456-7890',
            'email' => 'jane.doe@example.com',
        ]);
    }
    }

