<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function create()
    {
        return view('company_profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('company_profiles', 'public');
        }

        CompanyProfile::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('company_profiles.index')->with('success', 'Profile created successfully!');
    }

    public function index()
    {
        $profiles = CompanyProfile::all();
        return view('company_profiles.index', compact('profiles'));
    }

    public function edit($id)
{
    $profile = CompanyProfile::findOrFail($id);
    return view('company_profiles.edit', compact('profile'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $profile = CompanyProfile::findOrFail($id);

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($profile->image) {
            Storage::delete('public/' . $profile->image);
        }
        // Store the new image
        $imagePath = $request->file('image')->store('company_profiles', 'public');
        $profile->image = $imagePath;
    }

    $profile->name = $request->name;
    $profile->position = $request->position;
    $profile->description = $request->description;
    $profile->save();

    return redirect()->route('company_profiles.index')->with('success', 'Profile updated successfully!');
}

public function destroy($id)
{
    $profile = CompanyProfile::findOrFail($id);

    // Delete the image if it exists
    if ($profile->image) {
        Storage::delete('public/' . $profile->image);
    }

    $profile->delete();

    return redirect()->route('company_profiles.index')->with('success', 'Profile deleted successfully!');
}

}
