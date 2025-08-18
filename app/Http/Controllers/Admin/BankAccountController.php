<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BankAccount;

class BankAccountController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Admin Dashboard',
            'description' => 'Welcome to the admin dashboard. Here you can manage orders, products, and more.',
            'bank_account' => BankAccount::findOrFail(1),
        ];

        return view('admin.bank', $viewData);
    }
}
