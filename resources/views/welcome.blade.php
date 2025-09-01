@extends('layouts.landing')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-dark via-dark-light to-dark"></div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 floating" data-aos="fade-up" data-aos-delay="500">
            <i class="fas fa-gem text-primary/30 text-4xl"></i>
        </div>
        <div class="absolute top-40 right-20 floating" data-aos="fade-up" data-aos-delay="700" style="animation-delay: 1s;">
            <i class="fas fa-ring text-primary/20 text-3xl"></i>
        </div>
        <div class="absolute bottom-40 left-20 floating" data-aos="fade-up" data-aos-delay="900"
            style="animation-delay: 2s;">
            <i class="fas fa-crown text-primary/25 text-5xl"></i>
        </div>

        <div class="container mx-auto px-6 relative z-10 min-h-screen flex items-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">
            <!-- Left Content -->
            <div class="flex flex-col justify-center items-center lg:items-start text-center lg:text-left">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif font-bold mb-6" data-aos="fade-up">
                <span class="gradient-text">Celuk Silver Creative</span>
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl mb-8 text-gray-300 max-w-xl" data-aos="fade-up" data-aos-delay="200">
                Where Elegance Meets Community. Discover exquisite jewelry crafted with passion and connect with
                fellow jewelry enthusiasts.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start w-full" data-aos="fade-up"
                data-aos-delay="400">
                <button
                    class="bg-primary hover:bg-primary-dark px-6 md:px-8 py-3 md:py-4 rounded-full text-base md:text-lg font-semibold transition-all transform hover:scale-105 shine w-full sm:w-auto">
                    Explore Collections
                </button>
                <button
                    class="border-2 border-primary hover:bg-primary hover:text-dark px-6 md:px-8 py-3 md:py-4 rounded-full text-base md:text-lg font-semibold transition-all transform hover:scale-105 w-full sm:w-auto">
                    Join Community
                </button>
                </div>
            </div>

            <!-- Right Content - Jewelry Image -->
            <div class="relative flex justify-center items-center" data-aos="fade-left" data-aos-delay="300">
                <div class="relative w-full max-w-md md:max-w-lg lg:max-w-xl">
                <!-- Main jewelry showcase -->
                <div class="relative w-full h-64 md:h-96 lg:h-[500px] rounded-3xl overflow-hidden jewelry-glow">
                    <img src="https://images.unsplash.com/photo-1617191880362-aac615de3c26?q=80&w=4050&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Celuk Silver Creative" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/30 via-transparent to-transparent"></div>

                    <!-- Floating product cards -->
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-2xl p-4 transform rotate-3 floating"
                    style="animation-delay: 1s;">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-star text-yellow-400"></i>
                        <span class="text-sm font-semibold text-gray-800">Premium Quality</span>
                    </div>
                    </div>

                    <div class="absolute bottom-6 left-6 bg-primary/90 backdrop-blur-sm rounded-2xl p-4 transform -rotate-2 floating"
                    style="animation-delay: 2s;">
                    <div class="text-white">
                        <div class="text-xl md:text-2xl font-bold">500+</div>
                        <div class="text-xs md:text-sm">Unique Pieces</div>
                    </div>
                    </div>

                    <div class="absolute top-1/2 -right-4 bg-dark/90 backdrop-blur-sm rounded-2xl p-4 transform rotate-6 floating"
                    style="animation-delay: 0.5s;">
                    <div class="text-center">
                        <i class="fas fa-gem text-primary text-lg md:text-2xl mb-1"></i>
                        <div class="text-white text-xs">Handcrafted</div>
                    </div>
                    </div>
                </div>

                <!-- Decorative elements around the image -->
                <div class="absolute -top-8 -left-8 w-12 h-12 md:w-16 md:h-16 bg-primary/20 rounded-full blur-xl"></div>
                <div class="absolute -bottom-8 -right-8 w-16 h-16 md:w-24 md:h-24 bg-primary-light/20 rounded-full blur-xl"></div>
                <div class="absolute top-1/2 -left-12 w-6 h-6 md:w-8 md:h-8 bg-primary-lighter/30 rounded-full blur-lg"></div>
                </div>

                <!-- Additional floating jewelry icons around the image -->
                <div class="absolute -top-6 left-1/4 floating" style="animation-delay: 1.5s;">
                <i class="fas fa-ring text-primary/40 text-xl md:text-3xl"></i>
                </div>
                <div class="absolute -bottom-6 right-1/4 floating" style="animation-delay: 2.5s;">
                <i class="fas fa-heart text-primary/30 text-lg md:text-2xl"></i>
                </div>
                <div class="absolute top-1/4 -right-8 floating" style="animation-delay: 0.8s;">
                <i class="fas fa-crown text-primary/35 text-2xl md:text-4xl"></i>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Featured Collections -->
    <section id="collections" class="py-20 bg-gradient-to-br from-primary via-brown-medium to-brown-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-serif font-bold text-white mb-4" data-aos="fade-up">
                    Featured Collections
                </h2>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Handcrafted masterpieces that tell stories of elegance and sophistication
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-dark/30 backdrop-blur-sm p-8 h-80 flex items-center justify-center transform transition-all duration-500 group-hover:scale-105 border border-white/20">
                        <div class="text-center">
                            <i class="fas fa-ring text-6xl text-white mb-4 floating"></i>
                            <h3 class="text-2xl font-serif font-bold mb-2 text-white">Elegant Rings</h3>
                            <p class="text-gray-200">Timeless designs for special moments</p>
                        </div>
                    </div>
                </div>

                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-dark/30 backdrop-blur-sm p-8 h-80 flex items-center justify-center transform transition-all duration-500 group-hover:scale-105 border border-white/20">
                        <div class="text-center">
                            <i class="fas fa-gem text-6xl text-white mb-4 floating" style="animation-delay: 1s;"></i>
                            <h3 class="text-2xl font-serif font-bold mb-2 text-white">Premium Necklaces</h3>
                            <p class="text-gray-200">Statement pieces that captivate</p>
                        </div>
                    </div>
                </div>

                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-dark/30 backdrop-blur-sm p-8 h-80 flex items-center justify-center transform transition-all duration-500 group-hover:scale-105 border border-white/20">
                        <div class="text-center">
                            <i class="fas fa-crown text-6xl text-white mb-4 floating" style="animation-delay: 2s;"></i>
                            <h3 class="text-2xl font-serif font-bold mb-2 text-white">Royal Collection</h3>
                            <p class="text-gray-200">Luxury pieces fit for royalty</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-gradient-to-br from-brown-dark via-primary to-brown-medium">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-serif font-bold text-white mb-4" data-aos="fade-up">
                    Our Premium Products
                </h2>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Discover our exquisite collection of handcrafted jewelry pieces
                </p>
            </div>
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12 max-h-32 overflow-y-auto" data-aos="fade-up" data-aos-delay="300">
                <button
                    class="filter-btn px-6 py-3 bg-white/20 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/30"
                    data-category="all">
                    All Products
                </button>
                @foreach($categories as $category)
                    <button
                        class="filter-btn px-6 py-3 bg-white/20 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/30"
                        data-category="{{ strtolower($category->name) }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
            <!-- Product Search & Filter -->
            <div class="flex flex-col md:flex-row gap-4 mb-8 justify-center items-center text-white" data-aos="fade-up" data-aos-delay="200">
                <input type="text" id="product-search" placeholder="Search products..." class="px-6 py-3 rounded-full bg-white/20 text-white focus:outline-none focus:bg-white/30 transition-all border border-white/30 w-full md:w-1/3" />
            </div>

            <!-- Product Grid -->
            <div id="product-grid" class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <a href="{{ route('landing.product-detail', $product->id) }}" class="product-card rounded-2xl overflow-hidden transform transition-all duration-500 hover:scale-105 hover:rotate-1 block"
                        data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}"
                        data-name="{{ strtolower($product->name) }}"
                        data-description="{{ strtolower($product->description) }}"
                        data-category="{{ strtolower($product->category->name) }}">
                        <div class="relative h-64 bg-gradient-to-br from-primary-lighter to-primary-dark flex items-center justify-center">
                            @if($product->images && count($product->images) > 0)
                                @php
                                    $imgPath = $product->images[0]->path;
                                    $isUrl = filter_var($imgPath, FILTER_VALIDATE_URL);
                                @endphp
                                <img src="{{ $isUrl ? $imgPath : asset('storage/' . $imgPath) }}" alt="{{ $product->name }}" class="object-cover w-full h-full rounded-2xl" />
                            @else
                                <div class="flex items-center justify-center w-full h-full text-gray-400">No Image</div>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="price-tag px-3 py-1 rounded-full text-sm">IDR. {{ $product->price }}</span>
                            </div>
                        </div>
                        <div class="p-6 bg-dark/80 backdrop-blur-sm">
                            <h3 class="text-xl font-serif font-bold text-white mb-2">{{ $product->name }}</h3>
                            <h4 class="text-md font-serif font-normal text-yellow-400 mb-2 product-category" id="product-category">{{ $product->category->name }}</h4>
                            <p class="text-gray-300 text-sm mb-4">{{ $product->description }}</p>
                            <div class="flex items-center justify-end">
                                <button
                                    class="bg-white text-primary px-4 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Order
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- JS Pagination Controls -->
            <div id="pagination-controls" class="flex justify-center mt-12" data-aos="fade-up" data-aos-delay="900"></div>

            <script>
                // JS Pagination, Search & Category Filter
                document.addEventListener('DOMContentLoaded', function () {
                    const products = Array.from(document.querySelectorAll('.product-card'));
                    const grid = document.getElementById('product-grid');
                    const pagination = document.getElementById('pagination-controls');
                    const searchInput = document.getElementById('product-search');
                    const filterBtns = document.querySelectorAll('.filter-btn');
                    const perPage = 8;
                    let currentPage = 1;
                    let filteredProducts = products;
                    let selectedCategory = 'all';

                    function renderProducts() {
                        grid.innerHTML = '';
                        const start = (currentPage - 1) * perPage;
                        const end = start + perPage;
                        filteredProducts.slice(start, end).forEach(card => grid.appendChild(card));
                    }

                    function renderPagination() {
                        pagination.innerHTML = '';
                        const totalPages = Math.ceil(filteredProducts.length / perPage);
                        if (totalPages <= 1) return;

                        const nav = document.createElement('nav');
                        nav.className = "inline-flex space-x-2 bg-dark/60 backdrop-blur-sm px-6 py-4 rounded-full shadow-lg border border-primary/30";

                        // Prev
                        const prev = document.createElement('button');
                        prev.className = `px-4 py-2 rounded-full ${currentPage === 1 ? 'bg-gray-700 text-gray-400 cursor-not-allowed' : 'bg-primary text-white hover:bg-primary-dark transition-all'}`;
                        prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
                        prev.disabled = currentPage === 1;
                        prev.onclick = () => { if (currentPage > 1) { currentPage--; update(); } };
                        nav.appendChild(prev);

                        // Pages
                        for (let i = 1; i <= totalPages; i++) {
                            const btn = document.createElement('button');
                            btn.className = `px-4 py-2 rounded-full ${i === currentPage ? 'bg-primary text-white font-bold shadow-md' : 'bg-white/10 text-white hover:bg-primary hover:text-white transition-all'}`;
                            btn.textContent = i;
                            btn.disabled = i === currentPage;
                            btn.onclick = () => { currentPage = i; update(); };
                            nav.appendChild(btn);
                        }

                        // Next
                        const next = document.createElement('button');
                        next.className = `px-4 py-2 rounded-full ${currentPage === totalPages ? 'bg-gray-700 text-gray-400 cursor-not-allowed' : 'bg-primary text-white hover:bg-primary-dark transition-all'}`;
                        next.innerHTML = '<i class="fas fa-chevron-right"></i>';
                        next.disabled = currentPage === totalPages;
                        next.onclick = () => { if (currentPage < totalPages) { currentPage++; update(); } };
                        nav.appendChild(next);

                        pagination.appendChild(nav);
                    }

                    function update() {
                        renderProducts();
                        renderPagination();
                    }

                    function filterProducts() {
                        const q = searchInput.value.trim().toLowerCase();
                        filteredProducts = products.filter(card => {
                            const name = card.dataset.name;
                            const desc = card.dataset.description;
                            const cat = card.dataset.category;
                            const matchesSearch = name.includes(q) || desc.includes(q);
                            const matchesCategory = selectedCategory === 'all' || cat === selectedCategory;
                            return matchesSearch && matchesCategory;
                        });
                        currentPage = 1;
                        update();
                    }

                    searchInput.addEventListener('input', filterProducts);

                    filterBtns.forEach(btn => {
                        btn.addEventListener('click', function () {
                            filterBtns.forEach(b => b.classList.remove('bg-primary', 'text-dark'));
                            this.classList.add('bg-primary', 'text-dark');
                            selectedCategory = this.dataset.category;
                            filterProducts();
                        });
                    });

                    // Set "All Products" as active by default
                    filterBtns[0].classList.add('bg-primary', 'text-dark');

                    update();
                });
            </script>
        </div>
    </section>

    <!-- Community Section -->
    <section id="community" class="py-20 bg-gradient-to-br from-brown-medium via-primary-dark to-brown-dark">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-5xl font-serif font-bold gradient-text mb-6">
                        Join Our Community
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Connect with passionate jewelry enthusiasts, share your collections, get expert advice, and discover
                        the latest trends in the world of fine jewelry.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-dark"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold">Expert Community</h3>
                                <p class="text-gray-400">Learn from jewelry experts and collectors</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                <i class="fas fa-star text-dark"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold">Exclusive Access</h3>
                                <p class="text-gray-400">Get early access to new collections</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                <i class="fas fa-heart text-dark"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold">Personalized Service</h3>
                                <p class="text-gray-400">Custom jewelry recommendations</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left">
                    <div class="bg-dark-light rounded-3xl p-8 jewelry-glow">
                        <div class="text-center mb-8">
                            <h3 class="text-3xl font-serif font-bold gradient-text mb-4">Community Stats</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-primary mb-2">10K+</div>
                                <div class="text-gray-400">Active Members</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-primary mb-2">500+</div>
                                <div class="text-gray-400">Jewelry Pieces</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-primary mb-2">50+</div>
                                <div class="text-gray-400">Expert Jewelers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-primary mb-2">24/7</div>
                                <div class="text-gray-400">Community Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gradient-to-br from-primary via-brown-light to-primary-dark">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-5xl font-serif font-bold text-white mb-8" data-aos="fade-up">
                    About Celuk Silver Creative
                </h2>
                <p class="text-xl text-gray-200 mb-12 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Founded with a passion for exquisite craftsmanship, Celuk Silver Creative has been creating timeless jewelry pieces
                    that celebrate life's most precious moments. Our community brings together jewelry enthusiasts,
                    collectors, and artisans from around the world.
                </p>

                <div class="grid md:grid-cols-3 gap-8 mt-16">
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-hammer text-dark text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-serif font-bold mb-4 text-white">Craftsmanship</h3>
                        <p class="text-gray-200">Every piece is meticulously crafted by skilled artisans with decades of
                            experience.</p>
                    </div>

                    <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-shield-alt text-dark text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-serif font-bold mb-4 text-white">Quality</h3>
                        <p class="text-gray-200">We use only the finest materials and maintain the highest standards of
                            quality.</p>
                    </div>

                    <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-infinity text-dark text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-serif font-bold mb-4 text-white">Timeless</h3>
                        <p class="text-gray-200">Our designs transcend trends, creating pieces that remain beautiful for
                            generations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-dark">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-serif font-bold gradient-text mb-4" data-aos="fade-up">
                        Get In Touch
                    </h2>
                    <p class="text-xl text-gray-300" data-aos="fade-up" data-aos-delay="200">
                        Ready to join our community or have questions about our collections?
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <div data-aos="fade-right">
                        <div class="space-y-8">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-dark"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold">Visit Our Showroom</h3>
                                    <p class="text-gray-400">123 Jewelry District, Silver City, SC 12345</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone text-dark"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold">Call Us</h3>
                                    <p class="text-gray-400">+1 (555) 123-4567</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-dark"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold">Email Us</h3>
                                    <p class="text-gray-400">hello@ucsilver.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-left">
                        <form class="space-y-6">
                            <div>
                                <input type="text" placeholder="Your Name"
                                    class="w-full bg-dark-light border border-primary/30 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            <div>
                                <input type="email" placeholder="Your Email"
                                    class="w-full bg-dark-light border border-primary/30 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            <div>
                                <textarea rows="5" placeholder="Your Message"
                                    class="w-full bg-dark-light border border-primary/30 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition-colors resize-none"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-primary hover:bg-primary-dark py-3 rounded-lg font-semibold transition-colors shine">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
