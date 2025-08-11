@extends('layouts.admin')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="font-serif font-bold text-4xl gradient-text">Product Management</h1>
        <button
            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-primary hover:bg-primary-dark text-dark font-semibold shine"
            onclick="document.getElementById('product-modal').classList.remove('hidden')">
            <i class="fas fa-plus-circle mr-2 h-5 w-5"></i> Add New Product
        </button>
    </div>

    <div class="bg-dark-light rounded-lg p-6 border border-primary/20 jewelry-glow">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                    <tr class="border-primary/30">
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter w-[100px]">Image</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Product Name</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Price</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Stock</th>
                        <th class="h-12 px-4 text-right align-middle font-medium text-primary-lighter">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    <tr class="border-primary/10 hover:bg-primary/10">
                        <td class="p-4 align-middle">
                            <img src="/elegant-silver-ring.png" alt="Diamond Elegance Ring" width="60" height="60"
                                class="rounded-md object-cover" />
                        </td>
                        <td class="p-4 align-middle font-medium text-gray-200">Diamond Elegance Ring</td>
                        <td class="p-4 align-middle text-gray-300">$299.00</td>
                        <td class="p-4 align-middle text-gray-300">50</td>
                        <td class="p-4 align-middle text-right">
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20"
                                onclick="document.getElementById('product-modal').classList.remove('hidden')">
                                <i class="fas fa-edit h-4 w-4"></i>
                                <span class="sr-only">Edit</span>
                            </button>
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20">
                                <i class="fas fa-trash-alt h-4 w-4"></i>
                                <span class="sr-only">Delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-primary/10 hover:bg-primary/10">
                        <td class="p-4 align-middle">
                            <img src="/placeholder.svg?height=60&width=60" alt="Sapphire Pendant" width="60"
                                height="60" class="rounded-md object-cover" />
                        </td>
                        <td class="p-4 align-middle font-medium text-gray-200">Sapphire Pendant</td>
                        <td class="p-4 align-middle text-gray-300">$599.00</td>
                        <td class="p-4 align-middle text-gray-300">30</td>
                        <td class="p-4 align-middle text-right">
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20"
                                onclick="document.getElementById('product-modal').classList.remove('hidden')">
                                <i class="fas fa-edit h-4 w-4"></i>
                                <span class="sr-only">Edit</span>
                            </button>
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20">
                                <i class="fas fa-trash-alt h-4 w-4"></i>
                                <span class="sr-only">Delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-primary/10 hover:bg-primary/10">
                        <td class="p-4 align-middle">
                            <img src="/placeholder.svg?height=60&width=60" alt="Royal Crown Tiara" width="60"
                                height="60" class="rounded-md object-cover" />
                        </td>
                        <td class="p-4 align-middle font-medium text-gray-200">Royal Crown Tiara</td>
                        <td class="p-4 align-middle text-gray-300">$899.00</td>
                        <td class="p-4 align-middle text-gray-300">15</td>
                        <td class="p-4 align-middle text-right">
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20"
                                onclick="document.getElementById('product-modal').classList.remove('hidden')">
                                <i class="fas fa-edit h-4 w-4"></i>
                                <span class="sr-only">Edit</span>
                            </button>
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20">
                                <i class="fas fa-trash-alt h-4 w-4"></i>
                                <span class="sr-only">Delete</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Product Add/Edit Modal (hidden by default) -->
    <div id="product-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden">
        <div class="relative sm:max-w-[600px] bg-dark-light text-white border-primary/30 rounded-lg p-6">
            <div class="flex flex-col space-y-1.5 text-center sm:text-left">
                <h2 class="text-2xl font-serif gradient-text">Add New Product</h2>
                <p class="text-gray-400">Fill in the details for the new product.</p>
            </div>
            <form class="grid gap-4 py-4">
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="name" class="text-right text-gray-200">Name</label>
                    <input id="name" name="name"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="price" class="text-right text-gray-200">Price</label>
                    <input id="price" name="price" type="number" step="0.01"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="stock" class="text-right text-gray-200">Stock</label>
                    <input id="stock" name="stock" type="number"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="image" class="text-right text-gray-200">Image URL</label>
                    <input id="image" name="image"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary" />
                </div>
                <div class="grid grid-cols-4 items-center gap-4">
                    <label for="description" class="text-right text-gray-200">Description</label>
                    <textarea id="description" name="description"
                        class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 col-span-3 bg-dark border-primary/30 text-gray-200 focus:ring-primary"
                        required></textarea>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 justify-end mt-4">
                    <button type="button"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto bg-dark border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary"
                        onclick="document.getElementById('product-modal').classList.add('hidden')">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto bg-primary hover:bg-primary-dark text-dark font-semibold shine">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
