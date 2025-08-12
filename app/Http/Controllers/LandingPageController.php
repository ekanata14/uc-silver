<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
                'user_id' => 'nullable|exists:users,id',
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'customer_address' => 'required|string|max:500',
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
            $html = '
            <html>
            <head>
            <title>Invoice</title>
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
            <style>
            body { background: #f4f6fb; font-family: \'Montserrat\', Arial, sans-serif; }
            .invoice-box {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.12);
            padding: 40px 50px;
            border: none;
            }
            h2 {
            text-align: center;
            color: #1abc9c;
            font-size: 2.2em;
            margin-bottom: 10px;
            letter-spacing: 2px;
            }
            .meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            font-size: 1.05em;
            }
            .meta div {
            background: #e8f8f5;
            padding: 10px 18px;
            border-radius: 8px;
            color: #16a085;
            }
            table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: #e8f8f5;
            border-radius: 8px;
            overflow: hidden;
            }
            th {
            background: #1abc9c;
            color: #fff;
            font-weight: 700;
            padding: 14px 10px;
            border: none;
            }
            td {
            padding: 12px 10px;
            border: none;
            color: #16a085;
            font-size: 1.05em;
            text-align: center;
            }
            tr:not(:last-child) td {
            border-bottom: 1px solid #d1f2eb;
            }
            .total {
            font-weight: bold;
            color: #27ae60;
            font-size: 1.15em;
            }
            .thankyou {
            text-align: center;
            margin-top: 40px;
            font-size: 1.2em;
            color: #1abc9c;
            letter-spacing: 1px;
            }
            .brand {
            text-align: center;
            margin-bottom: 30px;
            }
            .brand img {
            max-height: 60px;
            margin-bottom: 10px;
            }
            </style>
            </head>
            <body>
            <div class="invoice-box">
            <div class="brand">
            <img src="https://img.icons8.com/color/96/000000/shopping-cart.png" alt="Store Logo">
            <h2>Invoice</h2>
            </div>
            <div class="meta">
            <div><strong>Date:</strong> ' . now()->format('d-m-Y H:i:s') . '</div>
            <div><strong>Order #:</strong> ' . $order->id . '</div>
            </div>
            <div class="meta">
            <div><strong>Invoice ID:</strong> ' . htmlspecialchars($validated['invoice_id']) . '</div>
            </div>
            <div class="meta">
            <div><strong>Customer Name:</strong> ' . htmlspecialchars($validated['customer_name']) . '</div>
            <div><strong>Email:</strong> ' . htmlspecialchars($validated['customer_email']) . '</div>
            </div>
            <div class="meta">
            <div style="width:100%;"><strong>Address:</strong> ' . htmlspecialchars($validated['customer_address']) . '</div>
            </div>
            <table>
            <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            </tr>
            <tr>
            <td>' . htmlspecialchars($product->name) . '</td>
            <td>' . $validated['quantity'] . '</td>
            <td>Rp ' . number_format($product->price, 0, ',', '.') . '</td>
            <td class="total">Rp ' . number_format($validated['total_price'], 0, ',', '.') . '</td>
            </tr>
            </table>
            <div class="thankyou">Thank you for your order!<br>We appreciate your business.</div>
            </div>
            </body>
            </html>
            ';

            // Generate PDF from HTML
            $pdf = Pdf::loadHTML($html);
            // Download PDF directly and set a success notification cookie
            // return response($pdf->output(), 200, [
            //     'Content-Type' => 'application/pdf',
            //     'Content-Disposition' => 'attachment; filename="invoice-' . $order->id . '.pdf"',
            // ]);
            // Download PDF and reload the page
            return response($pdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="invoice-' . $order->id . '.pdf"',
            ])->header('Refresh', '0;url=' . url()->previous());
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->withErrors(['error' => 'Order failed: ' . $e->getMessage()]);
        }
    }
}
