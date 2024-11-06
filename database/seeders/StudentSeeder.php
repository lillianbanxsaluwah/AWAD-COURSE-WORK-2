<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'full_name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'password' => bcrypt('password123'),
            'gender' => 'Female',
            'level' => 'Beginner',
            'age' => 20,
            'subjects' => 'Math, Science',
            'textarea' => 'This is a test student.'
        ]);




    }
}
