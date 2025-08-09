<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UC Silver - Premium Jewelry Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#8e6f2e',
                        'primary-dark': '#6b5423',
                        'primary-light': '#a68235',
                        'primary-lighter': '#d4af37',
                        dark: '#010101',
                        'dark-light': '#1a1a1a',
                        'brown-dark': '#4a3728',
                        'brown-medium': '#6b4e37',
                        'brown-light': '#8b6f47',
                    },
                    fontFamily: {
                        'serif': ['Playfair Display', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #8e6f2e, #a68235, #d4af37);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .jewelry-glow {
            box-shadow: 0 0 30px rgba(142, 111, 46, 0.3);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .shine {
            position: relative;
            overflow: hidden;
        }

        .shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .shine:hover::before {
            left: 100%;
        }

        .product-card {
            background: linear-gradient(135deg, #8e6f2e, #6b5423, #4a3728);
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .product-card:hover::before {
            transform: translateX(100%);
        }

        .price-tag {
            background: linear-gradient(135deg, #d4af37, #8e6f2e);
            color: #010101;
            font-weight: bold;
        }

        .product-overlay {
            background: linear-gradient(to top, rgba(142, 111, 46, 0.9), transparent);
        }
    </style>
</head>

<body class="bg-dark text-white font-sans">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-dark/90 backdrop-blur-md border-b border-primary/20">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2" data-aos="fade-right">
                    <i class="fas fa-gem text-primary text-2xl"></i>
                    <span class="text-2xl font-serif font-bold gradient-text">UC Silver</span>
                </div>

                <div class="hidden md:flex items-center space-x-8" data-aos="fade-left">
                    <a href="#home" class="hover:text-primary transition-colors">Home</a>
                    <a href="#collections" class="hover:text-primary transition-colors">Collections</a>
                    <a href="#products" class="hover:text-primary transition-colors">Products</a>
                    <a href="#community" class="hover:text-primary transition-colors">Community</a>
                    <a href="#about" class="hover:text-primary transition-colors">About</a>
                    <a href="#contact" class="hover:text-primary transition-colors">Contact</a>
                </div>

                <div class="flex items-center space-x-4" data-aos="fade-left" data-aos-delay="100">
                    <button class="hover:text-primary transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="hover:text-primary transition-colors">
                        <i class="fas fa-user"></i>
                    </button>
                    <button class="bg-primary hover:bg-primary-dark px-6 py-2 rounded-full transition-colors">
                        Join Community
                    </button>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- Footer -->
    <footer class="bg-dark-light py-12 border-t border-primary/20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-gem text-primary text-2xl"></i>
                        <span class="text-2xl font-serif font-bold gradient-text">UC Silver</span>
                    </div>
                    <p class="text-gray-400 mb-4">Creating timeless jewelry pieces that celebrate life's precious
                        moments.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Collections</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Community</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">About</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">Collections</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Rings</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Necklaces</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Earrings</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Bracelets</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Subscribe to get updates on new collections and exclusive offers.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email"
                            class="flex-1 bg-dark border border-primary/30 rounded-l-lg px-4 py-2 focus:outline-none focus:border-primary transition-colors">
                        <button class="bg-primary hover:bg-primary-dark px-4 py-2 rounded-r-lg transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-primary/20 mt-12 pt-8 text-center">
                <p class="text-gray-400">© 2024 UC Silver. All rights reserved. Crafted with passion for jewelry
                    enthusiasts.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navigation
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('bg-dark');
                nav.classList.remove('bg-dark/90');
            } else {
                nav.classList.add('bg-dark/90');
                nav.classList.remove('bg-dark');
            }
        });
    </script>
</body>

</html>
