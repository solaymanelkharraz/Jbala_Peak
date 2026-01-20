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

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);

        $uploadedFile = $cloudinary->uploadApi()->upload(
            $request->file('image')->getRealPath(),
            ['folder' => 'jbala_products'] 
        );

        $imageUrl = $uploadedFile['secure_url'];

        Product::create([
            'name' => $request->nom,       
            'price' => $request->prix,     
            'category' => $request->categorie,
            'description' => $request->description, 
            'image' => $imageUrl        
            
        ]);

        return redirect()->back()->with('success', 'Product added successfully to Jbala Peak!');
    }
    // 1. DASHBOARD: Shows the list of all products
    public function index()
    {
        // Get all products, 10 per page
        $products = Product::paginate(10); 
        return view('admin.products.index', compact('products'));
    }

    // 2. EDIT FORM: Shows the form pre-filled with existing data
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // 3. UPDATE: Saves the changes to the database
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Update basic info
        $product->name = $request->nom;
        $product->price = $request->prix;
        $product->category = $request->categorie;
        $product->description = $request->description;

        // Update Image (Only if a new one is uploaded)
        if ($request->hasFile('image')) {
            // Cloudinary Setup
            $cloudinary = new \Cloudinary\Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);
            
            // Upload & Get new URL
            $uploadedFile = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), ['folder' => 'jbala_products']);
            $product->image = $uploadedFile['secure_url'];
        }

        $product->save(); // Save changes
        return redirect()->route('produits.index')->with('success', 'Product updated successfully!');
    }

    // 4. DESTROY: Deletes the product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}