<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

// Email
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;

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

    public function order(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'customer_address' => 'required|string|max:500',
                'customer_mobile_phone' => 'required|string|max:15',
                'payment_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'quantity' => 'required|integer|min:1',
                'total_price' => 'required|numeric|min:0',
                'status' => 'required|string|max:50',
            ]);
            // Generate invoice_id automatically
            $validated['invoice_id'] = 'INV-' . strtoupper(uniqid()) . '-' . rand(1000, 9999);

            // Handle payment_receipt upload if present
            if ($request->hasFile('payment_receipt')) {
                $file = $request->file('payment_receipt');
                $path = $file->store('payment_receipts', 'public');
                $validated['payment_receipt'] = $path;
            }

            $order = DB::transaction(function () use ($validated) {
                return Order::create($validated);
            });

            // Generate simple HTML invoice
            $product = Product::find($validated['product_id']);
            $invoice = [
                'invoice_id' => $order->invoice_id,
                'customer_name' => $order->customer_name,
                'customer_email' => $order->customer_email,
                'customer_address' => $order->customer_address,
                'customer_mobile_phone' => $order->customer_mobile_phone,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'quantity' => $order->quantity,
                'total_price' => $order->total_price,
                'status' => $order->status,
            ];

            Mail::to($order->customer_email)->send(new InvoiceEmail($invoice));

            return back()->with('success', "Thank you for your purchase, your invoice has been sent to your email.");
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->withErrors(['error' => 'Order failed: ' . $e->getMessage()]);
        }
    }
}
