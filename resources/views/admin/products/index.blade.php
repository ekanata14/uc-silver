@extends('layouts.admin')
@section('content')
    <div x-data="productModals()" class="mb-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-lighter">Products</h1>
        <button @click="openAddModal" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">+ Add
            Product</button>
        <!-- Add Product Modal -->
        <div x-show="showAddModal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded shadow-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Add Product</h2>
                <form method="POST" action="{{ route('admin.products.store') }}">
                    @csrf
                    <div class="mb-2">
                        <label class="block text-sm font-medium">Name</label>
                        <input type="text" name="name" class="w-full border rounded px-2 py-1" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium">Price</label>
                        <input type="number" name="price" class="w-full border rounded px-2 py-1" required
                            step="0.01">
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium">Stock</label>
                        <input type="number" name="stock" class="w-full border rounded px-2 py-1" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium">Category</label>
                        <select name="category_id" class="w-full border rounded px-2 py-1" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium">Community</label>
                        <select name="community_id" class="w-full border rounded px-2 py-1" required>
                            @foreach ($communities as $community)
                                <option value="{{ $community->id }}">{{ $community->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" @click="closeAddModal" class="px-4 py-2 rounded bg-gray-200">Cancel</button>
                        <button type="submit" class="px-4 py-2 rounded bg-primary text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600 bg-green-100 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="overflow-x-auto bg-background rounded shadow">
        <table class="min-w-full divide-y divide-primary/10">
            <thead class="[&_tr]:border-b">
                <tr class="border-primary/30">
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter w-[100px]">Image</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Category</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Community</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Product Name</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Price</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Stock</th>
                    <th class="h-12 px-4 text-right align-middle font-medium text-primary-lighter">Actions</th>
                </tr>
            </thead>
            <tbody class="[&_tr:last-child]:border-0">
                @forelse ($products as $product)
                    <tr class="border-primary/10 hover:bg-primary/10">
                        <td class="p-4 align-middle">
                            @php
                                $primaryImage =
                                    $product->images->where('is_primary', true)->first() ?? $product->images->first();
                            @endphp
                            @if ($primaryImage)
                                <img src="{{ asset('storage/' . $primaryImage->path) }}" alt="{{ $product->name }}"
                                    width="60" height="60" class="rounded-md object-cover" />
                            @else
                                <img src="/placeholder.svg?height=60&width=60" alt="{{ $product->name }}" width="60"
                                    height="60" class="rounded-md object-cover" />
                            @endif
                        </td>
                        <td class="p-4 align-middle text-gray-300">
                            {{ $product->category->name }}
                        </td>
                        <td class="p-4 align-middle text-gray-300">
                            {{ $product->community->name }}
                        </td>
                        <td class="p-4 align-middle font-medium text-gray-200">{{ $product->name }}</td>
                        <td class="p-4 align-middle text-gray-300">${{ number_format($product->price, 2) }}</td>
                        <td class="p-4 align-middle text-gray-300">{{ $product->stock }}</td>
                        <td class="p-4 align-middle text-right">
                            <button
                                @click="openEditModal({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, {{ $product->stock }}, {{ $product->category_id }}, {{ $product->community_id }})"
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20">
                                <i class="fas fa-edit h-4 w-4"></i>
                                <span class="sr-only">Edit</span>
                            </button>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
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

    @if (method_exists($products, 'links'))
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    @endif

    <!-- Add Product Modal -->
    <div x-show="showAddModal" style="display: none;"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Add Product</h2>
            <form method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <div class="mb-2">
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" class="w-full border rounded px-2 py-1" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Price</label>
                    <input type="number" name="price" class="w-full border rounded px-2 py-1" required
                        step="0.01">
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Stock</label>
                    <input type="number" name="stock" class="w-full border rounded px-2 py-1" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Category</label>
                    <select name="category_id" class="w-full border rounded px-2 py-1" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Community</label>
                    <select name="community_id" class="w-full border rounded px-2 py-1" required>
                        @foreach ($communities as $community)
                            <option value="{{ $community->id }}">{{ $community->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="closeAddModal" class="px-4 py-2 rounded bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-primary text-white">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div x-show="showEditModal" style="display: none;"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Edit Product</h2>
            <form :action="editAction" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" class="w-full border rounded px-2 py-1"
                        x-model="editProduct.name" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Price</label>
                    <input type="number" name="price" class="w-full border rounded px-2 py-1"
                        x-model="editProduct.price" required step="0.01">
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Stock</label>
                    <input type="number" name="stock" class="w-full border rounded px-2 py-1"
                        x-model="editProduct.stock" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Category</label>
                    <select name="category_id" class="w-full border rounded px-2 py-1" x-model="editProduct.category_id"
                        required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Community</label>
                    <select name="community_id" class="w-full border rounded px-2 py-1"
                        x-model="editProduct.community_id" required>
                        @foreach ($communities as $community)
                            <option value="{{ $community->id }}">{{ $community->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="closeEditModal" class="px-4 py-2 rounded bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-primary text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
