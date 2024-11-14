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
        $students = Student::all(); // Fetch all student records
        return view('backend.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student.create');
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
        $student->age = $data['age'];
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
    public function edit($id)
    {

        // Retrieve the student record by ID
        $student = Student::findOrFail($id);

        // Return the edit view with the student data
        return view('backend.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the student record by ID
        $student = Student::findOrFail($id);

        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'password' => 'nullable|min:6',
            'gender' => 'required|in:Male,Female',
            'level' => 'nullable|string|max:100',
            'age' => 'nullable|integer|min:1',
            'subjects' => 'nullable|string',
            'textarea' => 'nullable|string',
            'img.*' => 'nullable|mimes:jpeg,jpg,png|max:2048', // Allow multiple image files
        ]);

        // Update basic fields
        $student->full_name = $request->input('full_name');
        $student->email = $request->input('email');
        $student->gender = $request->input('gender');
        $student->level = $request->input('level');
        $student->age = $request->input('age');
        $student->subjects = $request->input('subjects');
        $student->textarea = $request->input('textarea');

        // // If password is provided, hash and update it
        // if ($request->filled('password')) {
        //     $student->password = bcrypt('${1:my-secret-password')($request->input('password'));
        // }

        // Handle file uploads if files are provided
        if ($request->hasFile('img')) {
            $filePaths = [];
            foreach ($request->file('img') as $file) {
                $path = $file->store('uploads/students', 'public');
                $filePaths[] = $path;
            }
            $student->file_path = implode(',', $filePaths); // Store file paths as a comma-separated string
        }

        // Save the updated student data
        $student->save();

        // Redirect back with a success message
        return redirect()->route('student.index')->with('success', 'Student information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        // Retrieve the student record by ID
        $student = Student::findOrFail($id);

        // Delete the student record
        $student->delete();

        // Redirect back with a success message
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
