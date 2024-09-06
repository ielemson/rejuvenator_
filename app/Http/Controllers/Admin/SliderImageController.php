<?php

// app/Http/Controllers/Admin/SliderImageController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SliderImageController extends Controller
{


    public function index()
    {
        $sliders = SliderImage::all();
        return view('slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imagePath = $image->hashName('slider');

        // Maintain image quality
        $img = Image::make($image->getRealPath());
        $img->save(storage_path('app/public/images/' . $imagePath), 90); // Save with 90% quality

        SliderImage::create([
            'image_path' => $imagePath,
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
        ]);

        return redirect()->route('slider.create')->with('success', 'Slider image uploaded successfully.');
    }

    public function edit(SliderImage $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, SliderImage $slider)
    {
        $request->validate([
            'title_1' => 'required|string|max:255',
            'title_2' => 'required|string|max:255',
            'image_path' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slider->title_1 = $request->title_1;
        $slider->title_2 = $request->title_2;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imagePath = $image->hashName('slider');

            // Maintain image quality
            $img = Image::make($image->getRealPath());
            $img->save(storage_path('app/public/images/' . $imagePath), 90); // Save with 90% quality

            $slider->image_path = $imagePath;
        }

        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }
    public function destroy(SliderImage $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
