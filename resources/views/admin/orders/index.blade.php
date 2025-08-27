@extends('layouts.admin')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="font-serif font-bold text-4xl gradient-text">Order Management</h1>
        {{-- <a href="{{ route('admin.orders.create') }}"
            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-primary hover:bg-primary-dark text-dark font-semibold shine">
            <i class="fas fa-plus-circle mr-2 h-5 w-5"></i> Add New Order
        </a> --}}
    </div>

    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-2">
            <input type="text" id="order-search" placeholder="Search orders..."
                class="rounded-md border px-3 py-2 text-sm bg-dark-light text-primary-lighter focus:outline-none focus:ring-2 focus:ring-primary/50" />
            <button type="button" id="search-btn"
                class="bg-primary text-primary-foreground px-4 py-2 rounded-md text-sm font-medium hover:bg-primary/90">Search</button>
        </div>
        <button type="button" id="export-excel"
            class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700">
            <i class="fas fa-file-excel mr-2"></i> Download Excel
        </button>
    </div>
    <div class="bg-dark-light rounded-lg p-6 border border-primary/20 jewelry-glow">
        <div class="relative w-full overflow-auto">
            <table id="orders-table" class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                    <tr class="border-primary/30">
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">No</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Order ID</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Customer Name</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Email</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Address</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Product ID</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Community</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Quantity</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Total Price</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Status</th>
                        <th class="h-12 px-4 text-right align-middle font-medium text-primary-lighter">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    @foreach ($orders as $order)
                        <tr class="border-primary/10 hover:bg-primary/10">
                            <td class="p-4 align-middle">{{ $loop->iteration }}</td>
                            <td class="p-4 align-middle">{{ $order->id }}</td>
                            <td class="p-4 align-middle">{{ $order->customer_name }}</td>
                            <td class="p-4 align-middle">{{ $order->customer_email }}</td>
                            <td class="p-4 align-middle">{{ $order->customer_address }}</td>
                            <td class="p-4 align-middle">{{ $order->product->name }}</td>
                            <td class="p-4 align-middle">{{ $order->product->community->name }}</td>
                            <td class="p-4 align-middle">{{ $order->quantity }}</td>
                            <td class="p-4 align-middle">IDR. {{ number_format($order->total_price, 2) }}</td>
                            <td class="p-4 align-middle">{{ $order->status }}</td>
                            <td class="p-4 align-middle text-right">
                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20">
                                    <i class="fas fa-edit h-4 w-4"></i>
                                    <span class="sr-only">Edit</span>
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                    class="inline">
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
    @push('scripts')
        <!-- DataTables JS & CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <!-- SheetJS for Excel export -->
        <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#orders-table').DataTable({
                    "paging": true,
                    "searching": true,
                    "info": true
                });

                // Custom search
                $('#search-btn').on('click', function() {
                    table.search($('#order-search').val()).draw();
                });
                $('#order-search').on('keyup', function(e) {
                    if (e.key === 'Enter') {
                        table.search(this.value).draw();
                    }
                });

                // Export to Excel
                $('#export-excel').on('click', function() {
                    var wb = XLSX.utils.table_to_book(document.getElementById('orders-table'), {
                        sheet: "Orders"
                    });
                    XLSX.writeFile(wb, 'orders.xlsx');
                });
            });
        </script>
    @endpush
    </div>
@endsection
