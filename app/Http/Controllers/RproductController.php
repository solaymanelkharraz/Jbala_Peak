<?php

namespace App\Http\Controllers;

use App\Models\Product; // Make sure this matches your Model name!
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use Cloudinary\Cloudinary;

class RproductController extends Controller
{
    // Show the Form
    public function create()
    {
        return view('admin.products.create'); // We will create this view next
    }

    // Save the Product
    public function store(AddProductRequest $request)
    {
        // 1. Validation is already done by AddProductRequest

        // 2. Setup Cloudinary Manually (As per teacher's PDF)
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);

        // 3. Upload the image to Cloudinary
        $uploadedFile = $cloudinary->uploadApi()->upload(
            $request->file('image')->getRealPath(),
            ['folder' => 'jbala_products'] // Optional: folder name in Cloudinary
        );

        // 4. Get the Secure URL (https://...)
        $imageUrl = $uploadedFile['secure_url'];

        // 5. Save to Database
        Product::create([
            'name' => $request->nom,       // Input name="nom"
            'price' => $request->prix,     // Input name="prix"
            'category' => $request->categorie, // Input name="categorie"
            'description' => $request->description, // <--- ADD THIS
            'image' => $imageUrl           // Save the Cloudinary Link!
            
        ]);

        // 6. Redirect with Success Message
        return redirect()->back()->with('success', 'Product added successfully to Jbala Peak!');
    }
}