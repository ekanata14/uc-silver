<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_address' => 'required|string',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::create($validated);
            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Order creation failed: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            $order = Order::findOrFail($id);
            return view('admin.orders.show', compact('order'));
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found');
        }
    }

    public function edit(string $id)
    {
        try {
            $order = Order::findOrFail($id);
            return view('admin.orders.edit', compact('order'));
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found');
        }
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_id' => 'sometimes|integer',
            'user_id' => 'sometimes|integer',
            'customer_name' => 'sometimes|string',
            'customer_email' => 'sometimes|email',
            'customer_address' => 'sometimes|string',
            'quantity' => 'sometimes|integer',
            'total_price' => 'sometimes|numeric',
            'status' => 'sometimes|string',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            $order->update($validated);
            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Order update failed: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.orders.index')->with('error', 'Order deletion failed: ' . $e->getMessage());
        }
    }
}
