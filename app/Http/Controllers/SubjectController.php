<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all records from the desired model, for example, teachers or subjects
        $subjects = Subject::all(); // Replace 'Subject' with the appropriate model

        // Pass the records to the view
        return view('backend.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subjects.create'); // Adjust this to the correct path of your form view
    }

    // Store a new subject in the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'subject_code' => 'required|string|max:10|unique:subjects,subject_code',
        ]);

        // Create a new subject
        Subject::create([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        // Redirect back with success message
        return redirect()->route('subject.create')->with('success', 'Subject created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function  edit($id)
    {
        // Fetch the teacher by ID
        $subject = Subject::findOrFail($id);

        // Return the edit view with the teacher data
        return view('backend.subjects.edit', compact('subject'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
   // Update function
public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'subject_name' => 'required|string|max:255',
        'subject_code' => 'required|string|max:50',
    ]);

    // Find the subject by ID and update it
    $subject = Subject::findOrFail($id);
    $subject->update([
        'subject_name' => $request->input('subject_name'),
        'subject_code' => $request->input('subject_code'),
    ]);

    // Redirect with a success message
    return redirect()->route('subject.index')->with('success', 'Subject updated successfully!');
}

// Delete function
public function destroy($id)
{
    // Find the subject by ID and delete it
    $subject = Subject::findOrFail($id);
    $subject->delete();

    // Redirect with a success message
    return redirect()->route('subject.index')->with('success', 'Subject deleted successfully!');
}
}
