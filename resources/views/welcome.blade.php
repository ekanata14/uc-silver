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

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6" data-aos="fade-up">
                        <span class="gradient-text">UC Silver</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 text-gray-300 max-w-2xl" data-aos="fade-up" data-aos-delay="200">
                        Where Elegance Meets Community. Discover exquisite jewelry crafted with passion and connect with
                        fellow jewelry enthusiasts.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start" data-aos="fade-up"
                        data-aos-delay="400">
                        <button
                            class="bg-primary hover:bg-primary-dark px-8 py-4 rounded-full text-lg font-semibold transition-all transform hover:scale-105 shine">
                            Explore Collections
                        </button>
                        <button
                            class="border-2 border-primary hover:bg-primary hover:text-dark px-8 py-4 rounded-full text-lg font-semibold transition-all transform hover:scale-105">
                            Join Community
                        </button>
                    </div>
                </div>

                <!-- Right Content - Jewelry Image -->
                <div class="relative" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative">
                        <!-- Main jewelry showcase -->
                        <div class="relative w-full h-96 lg:h-[500px] rounded-3xl overflow-hidden jewelry-glow">
                            <img src="https://images.unsplash.com/photo-1617191880362-aac615de3c26?q=80&w=4050&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="UC Silver Jewelry Collection" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/30 via-transparent to-transparent">
                            </div>

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
                                    <div class="text-2xl font-bold">500+</div>
                                    <div class="text-sm">Unique Pieces</div>
                                </div>
                            </div>

                            <div class="absolute top-1/2 -right-4 bg-dark/90 backdrop-blur-sm rounded-2xl p-4 transform rotate-6 floating"
                                style="animation-delay: 0.5s;">
                                <div class="text-center">
                                    <i class="fas fa-gem text-primary text-2xl mb-1"></i>
                                    <div class="text-white text-xs">Handcrafted</div>
                                </div>
                            </div>
                        </div>

                        <!-- Decorative elements around the image -->
                        <div class="absolute -top-8 -left-8 w-16 h-16 bg-primary/20 rounded-full blur-xl"></div>
                        <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-primary-light/20 rounded-full blur-xl"></div>
                        <div class="absolute top-1/2 -left-12 w-8 h-8 bg-primary-lighter/30 rounded-full blur-lg"></div>
                    </div>

                    <!-- Additional floating jewelry icons around the image -->
                    <div class="absolute -top-6 left-1/4 floating" style="animation-delay: 1.5s;">
                        <i class="fas fa-ring text-primary/40 text-3xl"></i>
                    </div>
                    <div class="absolute -bottom-6 right-1/4 floating" style="animation-delay: 2.5s;">
                        <i class="fas fa-heart text-primary/30 text-2xl"></i>
                    </div>
                    <div class="absolute top-1/4 -right-8 floating" style="animation-delay: 0.8s;">
                        <i class="fas fa-crown text-primary/35 text-4xl"></i>
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
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="300">
                <button
                    class="px-6 py-3 bg-white/20 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/30">
                    All Products
                </button>
                <button
                    class="px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/20">
                    Rings
                </button>
                <button
                    class="px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/20">
                    Necklaces
                </button>
                <button
                    class="px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/20">
                    Earrings
                </button>
                <button
                    class="px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full text-white font-semibold hover:bg-white/30 transition-all border border-white/20">
                    Bracelets
                </button>
            </div>

            <!-- Product Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @php
                    $products = [
                        (object)[
                            'id' => 1,
                            'name' => 'Classic Silver Ring',
                            'description' => 'A timeless silver ring for every occasion.',
                            'price' => '120',
                            'icon' => 'fas fa-ring',
                            'icon_delay' => '0.5s',
                            'badge' => 'New',
                            'badge_class' => 'bg-primary text-white',
                            'rating' => 4.5,
                            'reviews' => 32,
                        ],
                        (object)[
                            'id' => 2,
                            'name' => 'Elegant Necklace',
                            'description' => 'Handcrafted necklace with premium silver.',
                            'price' => '250',
                            'icon' => 'fas fa-gem',
                            'icon_delay' => '1s',
                            'badge' => 'Best Seller',
                            'badge_class' => 'bg-yellow-400 text-dark',
                            'rating' => 5,
                            'reviews' => 54,
                        ],
                        (object)[
                            'id' => 3,
                            'name' => 'Royal Crown Earrings',
                            'description' => 'Luxury earrings fit for royalty.',
                            'price' => '180',
                            'icon' => 'fas fa-crown',
                            'icon_delay' => '1.5s',
                            'badge' => '',
                            'badge_class' => '',
                            'rating' => 4,
                            'reviews' => 21,
                        ],
                        (object)[
                            'id' => 4,
                            'name' => 'Silver Bracelet',
                            'description' => 'Elegant bracelet for daily wear.',
                            'price' => '95',
                            'icon' => 'fas fa-heart',
                            'icon_delay' => '2s',
                            'badge' => 'Limited',
                            'badge_class' => 'bg-red-500 text-white',
                            'rating' => 3.5,
                            'reviews' => 12,
                        ],
                    ];
                @endphp

                @foreach($products as $product)
                    <a href="{{ route('landing.product-detail', $product->id) }}" class="product-card rounded-2xl overflow-hidden transform transition-all duration-500 hover:scale-105 hover:rotate-1 block"
                        data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                        <div class="relative h-64 bg-gradient-to-br from-primary-lighter to-primary-dark flex items-center justify-center">
                            <i class="{{ $product->icon }} text-6xl text-white floating" @if(!empty($product->icon_delay)) style="animation-delay: {{ $product->icon_delay }};" @endif></i>
                            <div class="absolute top-4 right-4">
                                <span class="price-tag px-3 py-1 rounded-full text-sm">${{ $product->price }}</span>
                            </div>
                            @if(!empty($product->badge))
                                <div class="absolute top-4 left-4">
                                    <span class="{{ $product->badge_class }} px-2 py-1 rounded-full text-xs font-bold">{{ $product->badge }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 bg-dark/80 backdrop-blur-sm">
                            <h3 class="text-xl font-serif font-bold text-white mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-300 text-sm mb-4">{{ $product->description }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($product->rating >= $i)
                                            <i class="fas fa-star"></i>
                                        @elseif($product->rating >= $i - 0.5)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="text-gray-300 text-sm ml-2">({{ $product->reviews }})</span>
                                </div>
                                <button
                                    class="bg-white text-primary px-4 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="900">
                <button
                    class="bg-white text-primary px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shine">
                    Load More Products
                </button>
            </div>
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
                    About UC Silver
                </h2>
                <p class="text-xl text-gray-200 mb-12 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Founded with a passion for exquisite craftsmanship, UC Silver has been creating timeless jewelry pieces
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
