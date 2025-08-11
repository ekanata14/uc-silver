<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Welcome to Our Store',
            'description' => 'Explore our wide range of products and enjoy exclusive offers.',
            'products' => Product::latest()->get(), // Fetch latest 5 products for the landing page
        ];
        return view('welcome', $viewData);
    }

    public function productDetail(string $id)
    {
        $viewData = [
            'title' => 'Welcome to Our Store',
            'description' => 'Explore our wide range of products and enjoy exclusive offers.',
            'product' => Product::with('images')->findOrFail($id),
        ];
        // return $viewData;
        return view('product-detail', $viewData);
    }
}
