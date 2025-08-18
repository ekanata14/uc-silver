<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Category;
use App\Models\Community;
use App\Models\Product;
use App\Models\BankAccount;


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

    
    public function bank()
    {
        $viewData = [
            'title' => 'Admin Dashboard',
            'description' => 'Welcome to the admin dashboard. Here you can manage orders, products, and more.',
            'bankAccount' => BankAccount::where('id', 1)->first(),
        ];

        return view('admin.bank', $viewData);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'account_number' => 'required|string|max:50',
            'account_name'   => 'required|string|max:100',
            'bank_name'      => 'required|string|max:100',
            'bank_code'      => 'nullable|string|max:20',
        ]);

        // Cari data berdasarkan ID
        $bankAccount = BankAccount::findOrFail($id);

        // Update data
        $bankAccount->update($validated);

        return back()->with('success', 'Bank account updated successfully.');
    }

}
