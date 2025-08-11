@extends('layouts.admin')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="font-serif font-bold text-4xl gradient-text">Order Management</h1>
        <button
            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-primary hover:bg-primary-dark text-dark font-semibold shine"
            onclick="document.getElementById('order-modal').classList.remove('hidden')">
            <i class="fas fa-plus-circle mr-2 h-5 w-5"></i> Add New Order
        </button>
    </div>

    <div class="bg-dark-light rounded-lg p-6 border border-primary/20 jewelry-glow">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                    <tr class="border-primary/30">
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Order ID</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Customer Name</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Email</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Address</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Product ID</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Quantity</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Total Price</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Status</th>
                        <th class="h-12 px-4 text-right align-middle font-medium text-primary-lighter">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    @foreach ($orders as $order)
                        <tr class="border-primary/10 hover:bg-primary/10">
                            <td class="p-4 align-middle">{{ $order->id }}</td>
                            <td class="p-4 align-middle">{{ $order->customer_name }}</td>
                            <td class="p-4 align-middle">{{ $order->customer_email }}</td>
                            <td class="p-4 align-middle">{{ $order->customer_address }}</td>
                            <td class="p-4 align-middle">{{ $order->product_id }}</td>
                            <td class="p-4 align-middle">{{ $order->quantity }}</td>
                            <td class="p-4 align-middle">${{ number_format($order->total_price, 2) }}</td>
                            <td class="p-4 align-middle">{{ $order->status }}</td>
                            <td class="p-4 align-middle text-right">
                                <button
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20"
                                    onclick="openEditOrderModal({{ $order->id }})">
                                    <i class="fas fa-edit h-4 w-4"></i>
                                    <span class="sr-only">Edit</span>
                                </button>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20"
                                        onclick="return confirm('Are you sure you want to delete this order?')">
                                        <i class="fas fa-trash-alt h-4 w-4"></i>
                                        <span class="sr-only">Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Order Add/Edit Modal (hidden by default) -->
    <div id="order-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden">
        <div class="relative sm:max-w-[600px] bg-dark-light text-white border-primary/30 rounded-lg p-6">
            <div class="flex flex-col space-y-1.5 text-center sm:text-left">
                <h2 class="text-2xl font-serif gradient-text" id="order-modal-title">Add New Order</h2>
                <p class="text-gray-400" id="order-modal-desc">Fill in the details for the new order.</p>
            </div>
            <form id="order-form" class="grid gap-4 py-4" method="POST" enctype="multipart/form-data"
                action="{{ route('orders.store') }}">
                @csrf
                <input type="hidden" name="id" id="order-id" />
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="product_id" class="text-right text-gray-200">Product ID</label>
                    <input id="product_id" name="product_id" type="number"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="user_id" class="text-right text-gray-200">User ID</label>
                    <input id="user_id" name="user_id" type="number"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="customer_name" class="text-right text-gray-200">Customer Name</label>
                    <input id="customer_name" name="customer_name"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="customer_email" class="text-right text-gray-200">Customer Email</label>
                    <input id="customer_email" name="customer_email" type="email"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="customer_address" class="text-right text-gray-200">Customer Address</label>
                    <input id="customer_address" name="customer_address"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="quantity" class="text-right text-gray-200">Quantity</label>
                    <input id="quantity" name="quantity" type="number"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="total_price" class="text-right text-gray-200">Total Price</label>
                    <input id="total_price" name="total_price" type="number" step="0.01"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="status" class="text-right text-gray-200">Status</label>
                    <input id="status" name="status"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="flex flex-col sm:flex-row gap-2 justify-end mt-4">
                    <button type="button"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto bg-dark border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary"
                        onclick="closeOrderModal()">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto bg-primary hover:bg-primary-dark text-dark font-semibold shine"
                        id="order-modal-submit-btn">
                        Add Order
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function closeOrderModal() {
            document.getElementById('order-modal').classList.add('hidden');
            document.getElementById('order-form').reset();
            document.getElementById('order-modal-title').textContent = 'Add New Order';
            document.getElementById('order-modal-desc').textContent = 'Fill in the details for the new order.';
            document.getElementById('order-modal-submit-btn').textContent = 'Add Order';
            document.getElementById('order-form').action = "{{ route('orders.store') }}";
            document.getElementById('order-id').value = '';
        }

        function openEditOrderModal(orderId) {
            fetch(`/orders/${orderId}`)
                .then(response => response.json())
                .then(order => {
                    document.getElementById('order-modal').classList.remove('hidden');
                    document.getElementById('order-modal-title').textContent = 'Edit Order';
                    document.getElementById('order-modal-desc').textContent = 'Update the order details.';
                    document.getElementById('order-modal-submit-btn').textContent = 'Update Order';
                    document.getElementById('order-form').action = `/orders/${order.id}`;
                    document.getElementById('order-id').value = order.id;
                    document.getElementById('product_id').value = order.product_id;
                    document.getElementById('user_id').value = order.user_id;
                    document.getElementById('customer_name').value = order.customer_name;
                    document.getElementById('customer_email').value = order.customer_email;
                    document.getElementById('customer_address').value = order.customer_address;
                    document.getElementById('quantity').value = order.quantity;
                    document.getElementById('total_price').value = order.total_price;
                    document.getElementById('status').value = order.status;
                });
        }
    </script>
@endsection
