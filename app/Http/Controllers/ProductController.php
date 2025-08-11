<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Category;
use App\Models\Community;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    // Display a listing of products with images
    public function index()
    {
        $products = Product::with('images')->get();
        $viewData = [
            'products' => $products,
            'categories' => Category::all(),
            'communities' => Community::all()
        ];
        return view('admin.products.index', $viewData);
    }

    // Show the form for creating a new product
    public function create()
    {
        $viewData = [
            'categories' => Category::all(),
            'communities' => Community::all()
    ];
        return view('admin.products.create', $viewData);
    }

    // Store a newly created product and its images
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'community_id' => 'required|exists:communities,id',
            'description' => 'required|string|nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::create($validated); // Add other fields as needed

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $path = $image->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path,
                        'is_primary' => $key == 0, // First image as primary
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Display the specified product with images
    public function show(String $id)
    {
        $viewData = [
            'product' => Product::where('id', $id)->with('images')->firstOrFail(),
        ];
        return view('admin.products.show', $viewData);
    }

    // Show the form for editing the specified product
    public function edit(String $id)
    {
        $viewData = [
            'product' => Product::where('id', $id)->with('images')->firstOrFail(),
            'categories' => Category::all(),
            'communities' => Community::all()
        ];
        return view('admin.products.edit', $viewData);
    }

    // Update the specified product and its images
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->update($request->only(['name', 'description', 'price', 'stock']));

            if ($request->hasFile('images')) {
                // Delete old images
                // foreach ($product->images as $oldImage) {
                //     Storage::disk('public')->delete($oldImage->path);
                //     $oldImage->delete();
                // }
                // Store new images
                foreach ($request->file('images') as $key => $image) {
                    $path = $image->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path,
                        'is_primary' => $key == 0,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index', $product->id)
                ->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Remove the specified product and its images
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::where('id', $id)->with('images')->firstOrFail();
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
            $product->delete();

            DB::commit();
            return redirect()->route('admin.products.index')
                ->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteImage(string $id, string $imageId)
    {
        DB::beginTransaction();
        try {
            $product = Product::where('id', $id)->with('images')->firstOrFail();
            $image = $product->images()->findOrFail($imageId);
            Storage::disk('public')->delete($image->path);
            $image->delete();

            DB::commit();
            return redirect()->back()
                ->with('success', 'Image deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
