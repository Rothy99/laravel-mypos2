<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function Create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'pro_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Access validated data
        $productName = $validatedData['pro_name'];
        $image = $request->file('image');

        // Upload the image to the storage
        $imagePath = $image->store('images', 'public');

        // Mocked user response
        $data = [
            'pro_name' => $productName,
            'image' => $imagePath
        ];

        return response()->json(['data' => $data, 'message' => 'product created successfully']);
    }
    }
