@extends('app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-[#561C24] to-[#7D2E68]">
    <div class="w-full max-w-md p-8 glass-effect rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl my-8">
        <!-- Logo/Brand Area -->
        <div class="text-center mb-6">
            <h2 class="mt-3 text-2xl font-bold text-white">Welcome Back</h2>
            <p class="mt-1 text-sm text-gray-200">Sign in to your account to continue</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-500/10 border-l-4 border-red-500/50 rounded-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">Login failed:</p>
                        <ul class="mt-1 text-xs text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Login Form -->
        <form class="space-y-5" action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-200 mb-1">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="pl-10 w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400
                        focus:ring-2 focus:ring-white/20 focus:border-white transition-colors" 
                        placeholder="you@example.com" />
                </div>
            </div>
            
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-200 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="pl-10 w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400
                        focus:ring-2 focus:ring-white/20 focus:border-white transition-colors" 
                        placeholder="••••••••" />
                </div>
            </div>
            
            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                        class="w-4 h-4 bg-white/10 border-white/20 rounded text-[#561C24] focus:ring-white/20">
                    <label for="remember" class="ml-2 text-sm text-gray-200">Remember me</label>
                </div>
                <a href="#" class="text-sm font-medium text-white hover:text-gray-200 transition-colors">Forgot password?</a>
            </div>
            
            <!-- Login Button -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full px-4 py-3 text-[#561C24] bg-white rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-white/20 font-medium text-sm transition-colors duration-200 ease-in-out">
                    Sign In
                </button>
            </div>
        </form>
        
        <!-- Register Link -->
        <div class="text-sm text-center text-gray-200 mt-6">
            Don't have an account yet?
            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 font-medium">Create an account</a>
        </div>
    </div>
</div>

<style>
.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px 0 rgba(86, 28, 36, 0.37);
}
</style>
@endsection