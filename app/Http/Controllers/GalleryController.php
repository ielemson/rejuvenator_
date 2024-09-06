<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $imagePath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('gallery.index')
                         ->with('success', 'Image added to gallery successfully.');
    }


    public function edit($id)
    {   $gallery = Gallery::where("id",$id)->first();
        return view('galleries.edit', compact('gallery'));
    }


    public function update(Request $request, $id)
{
    $gallery = Gallery::where("id",$id)->first();

    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'required|boolean',
    ]);

    if ($request->hasFile('image')) {
        // Delete old image if a new one is uploaded
        \Storage::delete('public/' . $gallery->image);

        // Store new image
        $imagePath = $request->file('image')->store('images', 'public');
        $gallery->image = $imagePath;
    }

    // Update title and status
    $gallery->title = $request->title;
    $gallery->status = $request->status;
    $gallery->save();

    return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
}

    public function destroy($id)
    {
        $gallery = Gallery::where("id",$id)->first();
        // Delete image file
        \Storage::delete('public/' . $gallery->image);
        // Delete gallery record
        $gallery->delete();

        return redirect()->route('gallery.index')
                         ->with('success', 'Gallery deleted successfully.');
    }
}