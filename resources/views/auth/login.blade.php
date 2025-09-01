@extends('layouts.auth')
@section('content')
    <div class="bg-dark-light rounded-lg p-8 shadow-lg max-w-md w-full border border-primary/20 jewelry-glow">
        <div class="text-center mb-8">
            <i class="fas fa-gem text-primary text-4xl mb-4"></i>
            <h1 class="text-4xl font-serif font-bold gradient-text">Login to Celuk Silver Creative</h1>
            <p class="text-gray-400 mt-2">Access your admin dashboard or community account</p>
        </div>
        <form method="POST" action="{{ route('auth.login.post') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">Email or Username</label>
                <input type="text" id="email" name="email" placeholder="Enter your email or username"
                    class="w-full bg-dark border border-primary/30 rounded-md px-4 py-3 text-gray-200 focus:outline-none focus:border-primary transition-colors"
                    required />
            </div>
            <div>
                <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full bg-dark border border-primary/30 rounded-md px-4 py-3 text-gray-200 focus:outline-none focus:border-primary transition-colors"
                    required />
            </div>
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center">
                    <input type="checkbox" id="remember-me" name="remember"
                        class="h-4 w-4 text-primary rounded border-gray-600 focus:ring-primary" />
                    <label for="remember-me" class="ml-2 text-gray-400">Remember me</label>
                </div>
                <a href="#" class="text-primary-lighter hover:underline">Forgot Password?</a>
            </div>
            <button type="submit"
                class="w-full bg-primary hover:bg-primary-dark text-dark font-semibold py-3 rounded-md transition-colors shine">
                Login
            </button>
        </form>

        <div class="text-center mt-6 text-gray-400 text-sm">
            Don't have an account?
            <a href="#" class="text-primary-lighter hover:underline">Sign Up</a>
        </div>
    </div>
@endsection
