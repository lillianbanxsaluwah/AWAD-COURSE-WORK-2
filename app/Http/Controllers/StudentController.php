<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('backend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Step 1: Validate the request data
    $data = $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|string|min:6',
        'gender' => 'required',
        'level' => 'nullable|string',
        'age' => 'nullable|integer',
        'subjects' => 'nullable|string',
        'textarea' => 'nullable|string',
    ]);

    // Step 2: Handle file upload for multiple images
    $imagePaths = [];
    if ($request->hasFile('img')) {
        foreach ($request->file('img') as $file) {
            $filePath = $file->store('students_images', 'public');
            $imagePaths[] = $filePath; // Add each file path to an array
        }

    }

    // Step 3: Create each field individually
    $student = new Student();
    $student->full_name = $data['full_name'];
    $student->email = $data['email'];
    $student->password = bcrypt($data['password']); // Encrypt the password
    $student->gender = $data['gender'];
    $student->level = $data['level'];
    $student->age = $data['age'] ;
    $student->subjects = $data['subjects'];
    $student->textarea = $data['textarea']; // Store JSON-encoded file paths
    $student->save();

    // Redirect with success message
    return redirect()->route('student.create')->with('success', 'Student created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
