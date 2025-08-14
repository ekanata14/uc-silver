@extends('layouts.admin')
@section('content')
    <div x-data="productModals()" class="mb-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-lighter">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">+
            Add
            Product</a>
    </div>
    @if (session('success'))
        <div
            class="mb-4 flex items-center gap-2 bg-gradient-to-r from-green-400 via-green-300 to-green-200 border border-green-500 text-green-900 px-4 py-3 rounded-lg shadow-lg animate-fade-in">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div
            class="mb-4 flex items-center gap-2 bg-gradient-to-r from-red-400 via-red-300 to-red-200 border border-red-500 text-red-900 px-4 py-3 rounded-lg shadow-lg animate-fade-in">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <div class="bg-dark-light rounded-lg p-6 border border-primary/20 jewelry-glow">
        <div class="relative w-full overflow-auto">
            <table id="products-table" class="w-full caption-bottom text-sm divide-y divide-primary/10 display">
                <thead class="[&_tr]:border-b">
                    <tr class="border-primary/30">
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter w-[100px]">No</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter w-[100px]">Image</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Product Name</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Category</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Community</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Price</th>
                        <th class="h-12 px-4 text-right align-middle font-medium text-primary-lighter">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    @forelse ($products as $product)
                        <tr class="border-primary/10 hover:bg-primary/10">
                            <td class="p-4 align-middle">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 align-middle">
                                @php
                                    $primaryImage =
                                        $product->images->where('is_primary', true)->first() ??
                                        $product->images->first();
                                @endphp
                                @if ($primaryImage)
                                    @php
                                        $imagePath = $primaryImage->path;
                                        $isUrl = filter_var($imagePath, FILTER_VALIDATE_URL);
                                    @endphp
                                    <img src="{{ $isUrl ? $imagePath : asset('storage/' . $imagePath) }}" alt="{{ $product->name }}"
                                        width="60" height="60" class="rounded-md object-cover" />
                                @else
                                    <img src="/placeholder.svg?height=60&width=60" alt="{{ $product->name }}" width="60"
                                        height="60" class="rounded-md object-cover" />
                                @endif
                            </td>
                            <td class="p-4 align-middle font-medium text-gray-200">{{ $product->name }}</td>
                            <td class="p-4 align-middle text-gray-300">
                                {{ $product->category->name }}
                            </td>
                            <td class="p-4 align-middle text-gray-300">
                                {{ $product->community->name }}
                            </td>
                            <td class="p-4 align-middle text-gray-300">IDR. {{ number_format($product->price, 2) }}</td>
                            <td class="p-4 align-middle text-right">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20">
                                    <i class="fas fa-edit h-4 w-4"></i>
                                    <span class="sr-only">Edit</span>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    class="inline delete-product-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20 delete-product-btn">
                                        <i class="fas fa-trash-alt h-4 w-4"></i>
                                        <span class="sr-only">Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-400">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endsection

    @push('scripts')
        <!-- DataTables JS & Buttons extension (CDN) -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />

        <script>
            $(document).ready(function() {
                var table = $('#products-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        className: 'hidden', // Hide default button, use custom
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude Actions column
                        }
                    }],
                    pageLength: 10,
                    lengthChange: false,
                    searching: true,
                    ordering: false,
                    language: {
                        search: "",
                        searchPlaceholder: "Search products..."
                    }
                });

                // Custom search input
                $('#product-search').on('keyup', function() {
                    table.search(this.value).draw();
                });

                // Custom export button
                $('#export-excel').on('click', function() {
                    table.button('.buttons-excel').trigger();
                });
            });
        </script>

        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).on('click', '.delete-product-btn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will permanently delete the product.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        </script>
    @endpush
