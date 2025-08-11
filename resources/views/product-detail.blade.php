@extends('layouts.landing')
@section('content')
    <div class="container mx-auto px-6 py-12 max-w-6xl pt-32">
        <div class="grid md:grid-cols-2 gap-12 items-start">
            {{-- Image Gallery --}}
            <div>
                <div class="flex flex-col md:flex-row gap-6">
                    {{-- Thumbnails --}}
                    <div class="hidden md:flex flex-col gap-3 items-start">
                        @foreach ([1, 2, 3, 4] as $i)
                            <button
                                class="border rounded-lg overflow-hidden transition-colors {{ $i == 1 ? 'border-primary' : 'border-primary/20 hover:border-primary' }}">
                                <img src="https://images.unsplash.com/photo-1617191880362-aac615de3c26?q=80&w=4050&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="Diamond Elegance Ring - Thumbnail {{ $i }}" width="100" height="120"
                                    class="aspect-[5/6] object-cover" />
                                <span class="sr-only">View Image {{ $i }}</span>
                            </button>
                        @endforeach
                    </div>
                    {{-- Main Image --}}
                    <div class="flex-1">
                        <img src="https://images.unsplash.com/photo-1617191880362-aac615de3c26?q=80&w=4050&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Diamond Elegance Ring - Main Image" width="600" height="900"
                            class="aspect-[2/3] object-cover border border-primary/30 w-full rounded-lg overflow-hidden jewelry-glow shadow-lg" />
                    </div>
                </div>
            </div>

            {{-- Product Details --}}
            <div>
                <div class="grid gap-6">
                    <h1 class="font-serif font-bold text-4xl lg:text-5xl gradient-text mb-2">Diamond Elegance Ring</h1>
                    <div class="flex items-center gap-4 mb-2">
                        <div class="flex items-center gap-0.5 text-primary-lighter">
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="fas fa-star w-5 h-5 fill-primary-lighter"></i>
                            <i class="far fa-star w-5 h-5 fill-gray-600 stroke-gray-600"></i>
                        </div>
                        <span class="text-gray-400 text-sm ml-2">(24 Reviews)</span>
                    </div>
                    <div class="text-4xl font-bold text-primary-lighter mb-4">$299.00</div>
                    <p class="text-gray-300 text-lg leading-relaxed mb-6">
                        Exquisite diamond ring with a brilliant-cut diamond set in a lustrous platinum band. Perfect for
                        engagements, anniversaries, or as a timeless gift. Handcrafted with precision and care.
                    </p>
                </div>

                <form class="grid gap-8">
                    {{-- Color --}}
                    <div>
                        <label for="color" class="text-base text-gray-200 mb-2 block">Color</label>
                        <div class="flex items-center gap-3">
                            <label for="color-silver"
                                class="border border-primary/30 cursor-pointer rounded-md p-2 flex items-center gap-2 bg-primary/20 border-primary text-gray-200">
                                <input type="radio" id="color-silver" name="color" value="silver" class="sr-only"
                                    checked />
                                Silver
                            </label>
                            <label for="color-gold"
                                class="border border-primary/30 cursor-pointer rounded-md p-2 flex items-center gap-2 hover:bg-primary/20 hover:border-primary text-gray-200">
                                <input type="radio" id="color-gold" name="color" value="gold" class="sr-only" />
                                Gold
                            </label>
                            <label for="color-rose"
                                class="border border-primary/30 cursor-pointer rounded-md p-2 flex items-center gap-2 hover:bg-primary/20 hover:border-primary text-gray-200">
                                <input type="radio" id="color-rose" name="color" value="rose" class="sr-only" />
                                Rose Gold
                            </label>
                        </div>
                    </div>

                    {{-- Size --}}
                    <div>
                        <label for="size" class="text-base text-gray-200 mb-2 block">Size</label>
                        <div class="flex items-center gap-3">
                            <label for="size-7"
                                class="border border-primary/30 cursor-pointer rounded-md p-2 flex items-center gap-2 bg-primary/20 border-primary text-gray-200">
                                <input type="radio" id="size-7" name="size" value="7" class="sr-only"
                                    checked />
                                7
                            </label>
                            <label for="size-8"
                                class="border border-primary/30 cursor-pointer rounded-md p-2 flex items-center gap-2 hover:bg-primary/20 hover:border-primary text-gray-200">
                                <input type="radio" id="size-8" name="size" value="8" class="sr-only" />
                                8
                            </label>
                            <label for="size-9"
                                class="border border-primary/30 cursor-pointer rounded-md p-2 flex items-center gap-2 hover:bg-primary/20 hover:border-primary text-gray-200">
                                <input type="radio" id="size-9" name="size" value="9" class="sr-only" />
                                9
                            </label>
                        </div>
                    </div>

                    {{-- Quantity --}}
                    <div>
                        <label for="quantity" class="text-base text-gray-200 mb-2 block">Quantity</label>
                        <div class="flex items-center gap-3">
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium border bg-dark-light border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary h-10 w-10">
                                <i class="fas fa-minus h-4 w-4"></i>
                            </button>
                            <select id="quantity" name="quantity"
                                class="h-10 w-24 rounded-md border bg-dark-light border-primary/30 text-gray-200 px-3 py-2 text-sm focus:ring-primary focus:outline-none">
                                @for ($q = 1; $q <= 5; $q++)
                                    <option value="{{ $q }}">{{ $q }}</option>
                                @endfor
                            </select>
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium border bg-dark-light border-primary/30 text-primary-lighter hover:bg-primary/20 hover:border-primary h-10 w-10">
                                <i class="fas fa-plus h-4 w-4"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg text-lg font-semibold h-12 px-8 bg-primary hover:bg-primary-dark text-dark shine transition-colors"
                        onclick="document.getElementById('add-to-cart-modal').classList.remove('hidden')">
                        Add to Cart
                    </button>
                </form>
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
                    <img src="/elegant-silver-ring.png" alt="Diamond Elegance Ring" width="80" height="80"
                        class="rounded-md object-cover border border-primary/20" />
                    <div class="grid gap-1">
                        <h3 class="font-semibold text-lg text-primary-lighter">Diamond Elegance Ring</h3>
                        <p class="text-gray-300 text-sm">Quantity: 1</p>
                        <p class="text-gray-300 text-sm">Color: Silver</p>
                        <p class="text-gray-300 text-sm">Size: 7</p>
                        <p class="text-primary-lighter font-bold text-xl">$299.00</p>
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
