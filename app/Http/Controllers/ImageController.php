<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $file = $request->file('image');
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = $originalFilename . '_' . time() . '.' . $extension;
        $imagePath = $file->storeAs('uploads', $filename, 'public');

        return response()->json(['image_path' => $imagePath]);
    }


    public function convert(Request $request)
    {
        $request->validate([
            'image_path' => 'required|string',
            'format' => 'required|in:jpeg,gif,png,avif,bmp,webp',
        ]);

        $imagePath = $request->input('image_path');
        $format = $request->input('format');

        $convertedFileName = pathinfo($imagePath, PATHINFO_FILENAME) . '.' . $format;
        $convertedImagePath = 'converted/' . $convertedFileName;

        $image = Image::make(storage_path('app/public/' . $imagePath));
        $image->encode($format);
        Storage::put('public/' . $convertedImagePath, $image);

        return response()->json(['converted_image_path' => $convertedImagePath]);
    }

    public function download($filename)
    {
        $path = storage_path('app/public/converted/' . $filename);

        if (!Storage::exists('public/converted/' . $filename)) {
            abort(404);
        }

        return response()->download($path);
    }
}
