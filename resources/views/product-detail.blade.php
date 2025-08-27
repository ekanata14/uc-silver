@extends('layouts.landing')
@section('content')
    <div class="container mx-auto px-6 py-12 max-w-6xl pt-32">
        <div class="grid md:grid-cols-2 gap-12 items-start">
            {{-- Image Gallery --}}
            <div>
                <div class="flex flex-col md:flex-row gap-6">
                    {{-- Thumbnails --}}
                    <div
                        class="hidden md:flex flex-col gap-3 items-start max-h-[400px] overflow-y-auto scrollbar-thin scrollbar-thumb-primary/30 scrollbar-track-transparent">
                        @foreach ($product->images as $i => $image)
                            @php
                                $imageUrl = Str::startsWith($image->path, ['http://', 'https://'])
                                    ? $image->path
                                    : asset('storage/' . $image->path);
                            @endphp
                            <button
                                class="border rounded-lg overflow-hidden transition-colors {{ $image->is_primary ? 'border-primary' : 'border-primary/20 hover:border-primary' }}">
                                <img src="{{ $imageUrl }}" alt="{{ $product->name }} - Thumbnail {{ $i + 1 }}"
                                    width="100" height="120" class="aspect-[5/6] object-cover max-w-full" />
                                <span class="sr-only">View Image {{ $i + 1 }}</span>
                            </button>
                        @endforeach
                    </div>
                    {{-- Main Image --}}
                    <div class="flex-1">
                        @php
                            $primaryImage =
                                $product->images->firstWhere('is_primary', true) ?? $product->images->first();
                            $mainImageUrl =
                                $primaryImage && Str::startsWith($primaryImage->path, ['http://', 'https://'])
                                    ? $primaryImage->path
                                    : asset('storage/' . ($primaryImage->path ?? ''));
                        @endphp
                        <img src="{{ $mainImageUrl }}" alt="{{ $product->name }} - Main Image" width="600" height="900"
                            class="aspect-[2/3] object-cover border border-primary/30 w-full rounded-lg overflow-hidden jewelry-glow shadow-lg" />
                    </div>
                </div>
            </div>

            {{-- Product Details --}}
            <div>
                <div class="grid gap-6">
                    <h1 class="font-serif font-bold text-4xl lg:text-5xl gradient-text mb-2">{{ $product->name }}</h1>
                    {{-- <div class="flex items-center gap-4 mb-2">
                        <div class="flex items-center gap-0.5 text-primary-lighter">
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="far fa-star w-5 h-5 fill-gray-600 stroke-gray-600"></i>
                        </div>
                        <span class="text-gray-400 text-sm ml-2">(24 Reviews)</span>
                    </div> --}}
                    <div class="text-4xl font-bold text-primary-lighter mb-4">IDR. {{ number_format($product->price, 0, ',', '.') }}</div>
                    <p class="text-gray-300 text-lg leading-relaxed mb-6">
                        {{ $product->description }}
                    </p>
                </div>
                <form class="grid gap-8" id="order-form" method="POST" action="{{ route('landing.order.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->id() ?? '' }}">
                    <input type="hidden" name="status" value="paid">
                    <input type="hidden" name="total_price" id="total_price" value="{{ $product->price }}">

                    {{-- Quantity --}}
                    <div>
                        {{-- <label for="quantity" class="text-base text-gray-200 mb-2 block">Quantity</label>
                        <div class="flex items-center gap-3">
                            <button type="button" id="decrease-qty"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium border bg-dark-light border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary h-10 w-10">
                                <i class="fas fa-minus h-4 w-4"></i>
                            </button>
                            <input type="number" id="quantity" name="quantity" min="1" value="1"
                                class="h-10 w-24 rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none text-center" />
                            <button type="button" id="increase-qty"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium border bg-dark-light border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary h-10 w-10">
                                <i class="fas fa-plus h-4 w-4"></i>
                            </button>
                        </div> --}}
                        <div class="mb-4">
                            <span class="text-base text-gray-200 font-semibold">Category:</span>
                            <span class="text-primary-lighter font-bold">{{ $product->category->name ?? 'Uncategorized' }}</span>
                        </div>
                        @if($product->community)
                            <div class="mb-4">
                                <span class="text-base text-gray-200 font-semibold">Community:</span>
                                <span class="text-primary-lighter font-bold">{{ $product->community->name }}</span>
                            </div>
                        @endif
                        <script>
                            const qtyInput = document.getElementById('quantity');
                            const popupQty = document.getElementById('popup-quantity');
                            const price = {{ $product->price }};
                            const popupTotalPrice = document.getElementById('popup-total-price');
                            qtyInput.addEventListener('change', function() {
                                if (qtyInput.value < 1) qtyInput.value = 1;
                                popupQty.value = qtyInput.value;
                                popupTotalPrice.value = qtyInput.value * price;
                            });
                            document.getElementById('decrease-qty').onclick = function() {
                                let val = parseInt(qtyInput.value);
                                if (val > 1) qtyInput.value = val - 1;
                                qtyInput.dispatchEvent(new Event('change'));
                            };
                            document.getElementById('increase-qty').onclick = function() {
                                qtyInput.value = parseInt(qtyInput.value) + 1;
                                qtyInput.dispatchEvent(new Event('change'));
                            };
                        </script>
                    </div>

                    <button type="button"
                        class="inline-flex items-center justify-center rounded-lg text-lg font-semibold h-12 px-8 bg-primary hover:bg-primary-dark text-dark shine transition-colors"
                        onclick="document.getElementById('order-modal').classList.remove('hidden')">
                        Order
                    </button>
                </form>

                {{-- Order Modal --}}
                <div id="order-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 transition-all duration-300 ease-in-out hidden">
                    <div class="relative w-full max-w-3xl mx-4 sm:mx-0 bg-gradient-to-br from-dark-light via-dark to-primary/10 text-white border border-primary/40 rounded-2xl p-6 shadow-2xl animate__animated animate__fadeInUp">
                        <button type="button"
                            class="absolute top-4 right-4 text-gray-400 hover:text-primary-lighter transition-colors text-xl focus:outline-none"
                            onclick="document.getElementById('order-modal').classList.add('hidden')">
                            <i class="fas fa-times"></i>
                        </button>
                        <form id="order-popup-form" method="POST" action="{{ route('landing.order.store') }}"
                            class="grid gap-6" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->id() ?? '' }}">
                            <input type="hidden" name="status" value="pending">

                            <h2 class="text-2xl sm:text-3xl font-serif gradient-text mb-2 text-center col-span-2">Complete Your Order</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="grid gap-4">
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200 font-semibold">Total Price</label>
                                        <div class="flex items-center bg-gradient-to-r from-primary/10 to-dark-light rounded-lg p-2 shadow-inner">
                                            <span class="text-primary-lighter font-bold text-lg mr-2">IDR.</span>
                                            <input type="text" id="popup-total-price" name="total_price" value="{{ $product->price }}" readonly
                                                class="h-9 w-full rounded-lg border-2 border-primary/30 bg-dark-light text-primary-lighter px-3 py-2 text-lg font-bold focus:ring-primary focus:outline-none text-right shadow-sm transition-all duration-150" />
                                        </div>
                                    </div>
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200 font-semibold">Quantity</label>
                                        <div class="flex items-center gap-3 bg-gradient-to-r from-primary/10 to-dark-light rounded-lg p-2 shadow-inner">
                                            <button type="button" id="popup-decrease-qty"
                                                class="inline-flex items-center justify-center rounded-full text-sm font-bold border-2 border-primary bg-dark-light text-primary-lighter hover:bg-primary/20 hover:border-primary h-9 w-9 transition-all duration-150">
                                                <i class="fas fa-minus h-4 w-4"></i>
                                            </button>
                                            <input type="number" id="popup-quantity" name="quantity" min="1" value="1"
                                                class="h-9 w-20 rounded-lg border-2 border-primary/30 bg-dark-light text-gray-200 px-3 py-2 text-lg font-semibold focus:ring-primary focus:outline-none text-center shadow-sm transition-all duration-150" />
                                            <button type="button" id="popup-increase-qty"
                                                class="inline-flex items-center justify-center rounded-full text-sm font-bold border-2 border-primary bg-dark-light text-primary-lighter hover:bg-primary/20 hover:border-primary h-9 w-9 transition-all duration-150">
                                                <i class="fas fa-plus h-4 w-4"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200">Bank Account Details</label>
                                        @if($product->community && $product->community->bankAccount)
                                            <div class="bg-gradient-to-br from-primary/10 via-dark-light to-primary/20 border border-primary/40 rounded-lg p-4 text-sm text-gray-200 shadow-md">
                                                <div class="mb-2 flex items-center gap-2">
                                                    <span class="font-semibold text-primary-lighter">Bank Name:</span>
                                                    <span>{{ $product->community->bankAccount->bank_name }}</span>
                                                </div>
                                                <div class="mb-2 flex items-center gap-2">
                                                    <span class="font-semibold text-primary-lighter">Account Number:</span>
                                                    <span id="account-number" class="font-mono px-2 py-1 rounded bg-dark-light border border-primary/30">{{ $product->community->bankAccount->account_number }}</span>
                                                    <button type="button"
                                                        onclick="
                                                            navigator.clipboard.writeText(document.getElementById('account-number').textContent).then(function() {
                                                                Swal.fire({
                                                                    icon: 'success',
                                                                    title: 'Copied!',
                                                                    text: 'Account number copied to clipboard.',
                                                                    timer: 1500,
                                                                    showConfirmButton: false
                                                                });
                                                            });
                                                        "
                                                        class="ml-2 px-2 py-1 rounded bg-primary text-dark text-xs font-semibold hover:bg-primary-dark focus:outline-none transition-all duration-150 flex items-center gap-1"
                                                        title="Copy to clipboard">
                                                        <i class="fas fa-copy"></i> Copy
                                                    </button>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="font-semibold text-primary-lighter">Account Name:</span>
                                                    <span>{{ $product->community->bankAccount->account_name }}</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="bg-dark border border-primary/30 rounded-md p-3 text-sm text-gray-200">
                                                <span>No bank account information available.</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="grid gap-4">
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200">Name</label>
                                        <input type="text" name="customer_name" required
                                            class="rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none">
                                    </div>
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200">Email</label>
                                        <input type="email" name="customer_email" required
                                            class="rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none">
                                    </div>
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200">Mobile Phone</label>
                                        <input type="text" name="customer_mobile_phone" required
                                            class="rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none">
                                    </div>
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200">Address</label>
                                        <textarea name="customer_address" required rows="2"
                                            class="rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none"></textarea>
                                    </div>
                                    <div class="grid gap-2">
                                        <label class="text-base text-gray-200">Upload Payment Receipt</label>
                                        <input type="file" name="payment_receipt" accept="image/*,application/pdf" required
                                            class="rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none file:bg-primary file:text-dark file:rounded-md file:border-none">
                                        <span class="text-xs text-gray-400">Accepted formats: JPG, PNG, PDF</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2 justify-end mt-4 col-span-2">
                                <button type="button"
                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium border bg-dark border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary h-10 px-4 py-2 w-full sm:w-auto transition-all duration-150"
                                    onclick="document.getElementById('order-modal').classList.add('hidden')">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium bg-gradient-to-r from-primary to-primary-dark text-dark font-semibold shine h-10 px-4 py-2 w-full sm:w-auto transition-all duration-150">
                                    <i class="fas fa-file-invoice mr-2"></i> Submit Payment & Download Invoice
                                </button>
                            </div>
                        </form>
                        <script>
                            const popupQtyInput = document.getElementById('popup-quantity');
                            const popupTotalPriceInput = document.getElementById('popup-total-price');
                            const popupPrice = {{ $product->price }};
                            document.getElementById('popup-decrease-qty').onclick = function() {
                                let val = parseInt(popupQtyInput.value);
                                if (val > 1) popupQtyInput.value = val - 1;
                                popupQtyInput.dispatchEvent(new Event('change'));
                            };
                            document.getElementById('popup-increase-qty').onclick = function() {
                                popupQtyInput.value = parseInt(popupQtyInput.value) + 1;
                                popupQtyInput.dispatchEvent(new Event('change'));
                            };
                            popupQtyInput.addEventListener('change', function() {
                                if (popupQtyInput.value < 1) popupQtyInput.value = 1;
                                popupTotalPriceInput.value = (popupQtyInput.value * popupPrice).toFixed(2);
                            });
                        </script>
                    </div>
                </div>
                </div>

                <script>
                    // Sync quantity between main form and popup
                    const qtySelect = document.getElementById('quantity');
                    const popupQty = document.getElementById('popup-quantity');
                    const price = {{ $product->price }};
                    const popupTotalPrice = document.getElementById('popup-total-price');
                    qtySelect.addEventListener('change', function() {
                        popupQty.value = qtySelect.value;
                        popupTotalPrice.value = qtySelect.value * price;
                    });
                    document.getElementById('decrease-qty').onclick = function() {
                        let val = parseInt(qtySelect.value);
                        if (val > 1) qtySelect.value = val - 1;
                        qtySelect.dispatchEvent(new Event('change'));
                    };
                    document.getElementById('increase-qty').onclick = function() {
                        let val = parseInt(qtySelect.value);
                        if (val < 5) qtySelect.value = val + 1;
                        qtySelect.dispatchEvent(new Event('change'));
                    };
                </script>
            </div>
        </div>
    </div>

    {{-- Add to Cart Modal --}}
    <div id="add-to-cart-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden">
        <div class="relative sm:max-w-[425px] bg-dark-light text-white border-primary/30 rounded-lg p-6 shadow-xl">
            <div class="flex flex-col space-y-1.5 text-center sm:text-left">
                <h2 class="text-2xl font-serif gradient-text">Item Added to Cart!</h2>
                <p class="text-gray-400">You have successfully added the following item to your cart.</p>
            </div>
            <div class="grid gap-4 py-4">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('storage/' . ($primaryImage->path ?? '')) }}" alt="{{ $product->name }}"
                        width="80" height="80" class="rounded-md object-cover border border-primary/20" />
                    <div class="grid gap-1">
                        <h3 class="font-semibold text-lg text-primary-lighter">{{ $product->name }}</h3>
                        <p class="text-gray-300 text-sm">Quantity: 1</p>
                        <p class="text-gray-300 text-sm">Color: Silver</p>
                        <p class="text-gray-300 text-sm">Size: 7</p>
                        <p class="text-primary-lighter font-bold text-xl">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 justify-end">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium border bg-dark border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary h-10 px-4 py-2 w-full sm:w-auto"
                    onclick="document.getElementById('add-to-cart-modal').classList.add('hidden')">
                    Continue Shopping
                </button>
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium bg-primary hover:bg-primary-dark text-dark font-semibold shine h-10 px-4 py-2 w-full sm:w-auto">
                    View Cart
                </button>
            </div>
        </div>
    </div>
@endsection
