<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function productDetail()
    {
        // Logic to fetch product details
        return view('product-detail');
    }
}
