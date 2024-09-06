<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    
    public function create()
    {
        return view('events.create');
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image'  => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'status' => 'required',
        'location' => 'required|string',
        'time'   => 'required|date',
        'slug'   => Str::slug($request->title),
    ]);

    // Handling the image upload and move
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $newName = time() . '-' . $image->getClientOriginalName(); // Unique name for the image
        $image->move(public_path('images'), $newName); // Move the image to the public/images directory
    }

    Event::create([
        'title' => $validatedData['title'],
        'location' => $validatedData['location'],
        'description' => $validatedData['description'],
        'image' => 'images/' . $newName, // Save the path in the database
        'status' => $validatedData['status'],
        'time' => $validatedData['time'],
        'slug'   => Str::slug($request->title),
    ]);

    return redirect()->route('events.index')->with('success', 'Event created successfully.');
}

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }
    
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image',
            'status' => 'required',
            'location' => 'required|string',
            'time' => 'required|date',
            'slug'   => Str::slug($request->title),
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $event->update(['image' => $imagePath]);
        }
    
        $event->update($validatedData);
    
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
    
}
