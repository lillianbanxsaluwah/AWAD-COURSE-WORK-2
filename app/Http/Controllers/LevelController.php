<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('backend.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'level_name' => 'required|string|max:255|unique:levels,level_name',
            'section' => 'required|string|max:255|unique:levels,section',
        ]);

        try {
            $level = new Level();

            // Assign the data to the Level object
            $level->level_name = $request->input('level_name');
            $level->section = $request->input('section'); // Store the selected section
            $level->save();

            return redirect()->route('level.index')->with('success', 'Level created successfully.');
        } catch (QueryException $e) {
            // Check for unique constraint violations
            if ($e->getCode() === '23000') {
                if (strpos($e->getMessage(), 'levels_level_name_unique') !== false) {
                    return redirect()->back()->with('error', 'The level name is already taken.');
                }

                if (strpos($e->getMessage(), 'levels_section_unique') !== false) {
                    return redirect()->back()->with('error', 'The section name is already taken.');
                }
            }

            // For any other error, return a generic error message
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('backend.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $level = Level::findOrFail($id);
            // Assign the data to the Teacher object
            $level->level_name = $request->input('level_name');
            $level->section = $request->input('section'); // Store the selected section


            // Save the Teacher object to the database
            $level->save();
            return redirect()->route('level.index')->with('success', 'level updated successfully.');
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
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  // Find the teacher by ID
        $level = Level::findOrFail($id);

        // Delete the teacher
        $level->delete();

        // Redirect back with a success message
        return redirect()->route('level.index')->with('success', 'Level deleted successfully.');
    }
}
