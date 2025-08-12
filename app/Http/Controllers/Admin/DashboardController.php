<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Category;
use App\Models\Community;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Admin Dashboard',
            'description' => 'Welcome to the admin dashboard. Here you can manage orders, products, and more.',
            'orders_count' => Order::count(),
            'categories_count' => Category::count(),
            'communities_count' => Community::count(),
            'products_count' => Product::count(),
            'orders' => Order::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin.dashboard', $viewData);
    }
}
