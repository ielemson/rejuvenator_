<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{

    public function index()
    {
        $programs = Program::all();
        return view("programs.index", compact("programs"));
    }
    //
    public function create()
    {
        return view("programs.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('programs', 'public');
        }

        Program::create([
            'title' => $request->title,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('programs.index')->with('success', 'Program created successfully!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $program = Program::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($program->image) {
                Storage::delete('public/' . $program->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('programs', 'public');
            $program->image = $imagePath;
        }

        $program->title = $request->title;
        $program->status = $request->status;
        $program->description = $request->description;
        $program->save();

        return redirect()->route('programs.index')->with('success', 'Program updated successfully!');
    }

    public function destroy($id)

    {
    
        $program = Program::findOrFail($id);

        // Delete the image if it exists
        if ($program->image) {
            Storage::delete('public/' . $program->image);
        }
    
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
