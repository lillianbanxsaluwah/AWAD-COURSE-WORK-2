<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all teachers from the database
        $teachers = Teacher::all();

        // Pass teachers to the view
        return view('backend.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        try {
            $teacher = new Teacher();

            // Assign the data to the Teacher object
            $teacher->name = $request->input('name');
            $teacher->date_of_birth = $request->input('date_of_birth');
            $teacher->gender = $request->input('gender');
            $teacher->address = $request->input('address');
            $teacher->phone = $request->input('phone');
            $teacher->email = $request->input('email');

            // Save the Teacher object to the database
            $teacher->save();
            return redirect()->back()->with('success', 'Subject created successfully.');
        } catch (QueryException $e) {
            // Check if the error is a duplicate entry for phone or email
            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'teachers_phone_unique') !== false) {
                return redirect()->back()->with('error', 'The phone number is already taken.');
            }

            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'teachers_email_unique') !== false) {
                return redirect()->back()->with('error', 'The email address is already taken.');
            }

            // For any other error, return a generic error message
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('backend.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function  edit($id)
    {
        // Fetch the teacher by ID
        $teacher = Teacher::findOrFail($id);

        // Return the edit view with the teacher data
        return view('backend.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            // Assign the data to the Teacher object
            $teacher->name = $request->input('name');
            $teacher->date_of_birth = $request->input('date_of_birth');
            $teacher->gender = $request->input('gender');
            $teacher->address = $request->input('address');
            $teacher->phone = $request->input('phone');
            $teacher->email = $request->input('email');

            // Save the Teacher object to the database
            $teacher->save();
            return redirect()->route('teacher.index')->with('success', 'Subject updated successfully.');
        } catch (QueryException $e) {
            // Check if the error is a duplicate entry for phone or email
            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'teachers_phone_unique') !== false) {
                return redirect()->back()->with('error', 'The phone number is already taken.');
            }

            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'teachers_email_unique') !== false) {
                return redirect()->back()->with('error', 'The email address is already taken.');
            }

            // For any other error, return a generic error message
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the teacher by ID
        $teacher = Teacher::findOrFail($id);

        // Delete the teacher
        $teacher->delete();

        // Redirect back with a success message
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
