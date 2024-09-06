<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PartnerUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the upload
        if ($request->file('image')) {
            // Get the uploaded file
            $image = $request->file('image');

            // Generate a unique name for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Resize the image using Intervention Image
            $resizedImage = Image::make($image)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save the image to storage (you can choose your preferred storage disk)
            Storage::disk('public')->put('uploads/images/' . $imageName, (string) $resizedImage->encode());

            // Return a success response
            return response()->json([
                'message' => 'Image uploaded and resized successfully!',
                'image_url' => Storage::url('uploads/images/' . $imageName)
            ]);
        }

        return response()->json(['message' => 'Image upload failed!'], 500);
    }  
}
