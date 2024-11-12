<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for students, teachers, and sessions
        $currentStudentsCount = DB::table('students')->count();
        $currentTeachersCount = DB::table('teachers')->count();
        $currentSessionsCount = DB::table('sessions')->count();

        // Get the total number of subjects
        $totalSubjects = DB::table('subjects')->count();

        // Get the total number of users (excluding failed jobs and tokens)
        $totalUsers = DB::table('users')->count();

        // Get the number of students created each week
        $studentData = DB::table('students')
            ->selectRaw('YEARWEEK(created_at) as week, COUNT(*) as total')
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // Get the number of teachers created each week
        $teacherData = DB::table('teachers')
            ->selectRaw('YEARWEEK(created_at) as week, COUNT(*) as total')
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        return view('dashboard', compact(
            'currentStudentsCount',
            'currentTeachersCount',
            'currentSessionsCount',
            'totalSubjects',
            'totalUsers',
            'studentData',
            'teacherData'
        ));
    }
}
