<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - UC Silver</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#8e6f2e",
                        "primary-dark": "#6b5423",
                        "primary-light": "#a68235",
                        "primary-lighter": "#d4af37",
                        dark: "#010101",
                        "dark-light": "#1a1a1a",
                        "brown-dark": "#4a3728",
                        "brown-medium": "#6b4e37",
                        "brown-light": "#8b6f47",
                    },
                    fontFamily: {
                        serif: ["Playfair Display", "serif"],
                        sans: ["Inter", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
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
            content: "";
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
            content: "";
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
    <!-- Navigation Bar -->
    <nav class="fixed w-full z-50 bg-dark/90 backdrop-blur-md border-b border-primary/20">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-gem text-primary text-2xl"></i>
                    <span class="text-2xl font-serif font-bold gradient-text">UC Silver Admin</span>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="hover:text-primary transition-colors">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="hover:text-primary transition-colors">
                        <i class="fas fa-cog"></i>
                    </button>
                    <button class="hover:text-primary transition-colors">
                        <i class="fas fa-user-circle text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex pt-20">
        <!-- Sidebar -->
        <aside class="w-64 bg-dark-light border-r border-primary/20 p-6 h-screen fixed top-20 left-0 overflow-y-auto">
            <nav class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-primary-lighter mb-2">Dashboard</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.orders.*') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-shopping-cart mr-3"></i> Orders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.bank') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.bank.*') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-shopping-cart mr-3"></i> Bank Account
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-primary-lighter mb-2">Management</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.users.index') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-users mr-3"></i> Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.categories.*') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-tags mr-3"></i> Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.communities.index') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.categories.*') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-tags mr-3"></i> Community
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}"
                                class="flex items-center p-2 rounded-md {{ request()->routeIs('admin.products.*') ? 'bg-primary/20 text-primary-lighter font-medium' : 'text-gray-300 hover:bg-primary/20 hover:text-primary-lighter' }} transition-colors">
                                <i class="fas fa-box-open mr-3"></i> Product Management
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-primary-lighter mb-2">Settings</h3>
                    <ul class="space-y-1">
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center p-2 rounded-md text-gray-300 hover:bg-primary/20 hover:text-primary-lighter transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 ml-64 p-6">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#8e6f2e'
            });
        </script>
    @endif

    @if(session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#8e6f2e'
            });
        </script>
    @endif
</body> 
</html>
