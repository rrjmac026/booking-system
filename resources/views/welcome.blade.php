<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ReadSphere: Online Library System</title>
        <link rel="icon" href="{{ asset('images/ReadSphere_Logo.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        <!-- Custom Styles -->
        <style>
            body {
                padding-top: 80px; /* Add padding for fixed navbar */
            }
            .bg-image {
                background-image: linear-gradient(rgba(86, 28, 36, 0.9), rgba(125, 46, 104, 0.9)), url('{{asset('images/library_background.jpg')}}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                min-height: 100vh;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: -1;
            }
            .glass-effect {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px 0 rgba(86, 28, 36, 0.37);
            }
            .welcome-text {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }
            @keyframes fadeUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .animate-fade-up {
                animation: fadeUp 0.6s ease-out forwards;
            }
            .content-wrapper {
                position: relative;
                z-index: 1;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }
        </style>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="antialiased">
        <div class="bg-image"></div>
        
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 glass-effect">
            <div class="max-w-screen-xl mx-auto px-4 py-3">
                <div class="flex items-center justify-between">
                    <a href="" class="flex items-center space-x-3">
                        <img src="{{asset('images/ReadSphere_Logo.png')}}" class="h-12 w-auto rounded" alt="ReadSphere Logo" />
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold text-white welcome-text">ReadSphere</span>
                            <span class="text-sm text-gray-200">Digital Library System</span>
                        </div>
                    </a>
                    
                    <div class="flex items-center gap-4">
                        <a href="{{route('login')}}" class="hidden md:inline-flex px-6 py-2.5 text-white hover:text-gray-200 font-semibold transition-colors">
                            Sign In
                        </a>
                        <a href="{{route('register')}}" class="inline-flex px-6 py-2.5 text-white font-semibold glass-effect rounded-full hover:bg-white/20 transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="content-wrapper">
            <!-- Main Content -->
            <main class="flex-grow container mx-auto px-4 py-12">
                <div class="glass-effect p-8 sm:p-12 rounded-2xl w-full max-w-4xl mx-auto text-center mb-12">
                    <div class="animate-fade-up" style="animation-delay: 0.2s">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 welcome-text tracking-tight leading-tight">
                            Your Gateway to Digital Learning
                        </h1>
                        <p class="text-lg sm:text-xl text-white/90 mb-8 leading-relaxed max-w-2xl mx-auto">
                            Access thousands of books with our online library system. Transform your reading experience with our cutting-edge digital platform.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                            <a href="{{route('register')}}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-white text-[#561C24] font-semibold rounded-lg transition-all duration-300 hover:scale-105">
                                Start Your Journey
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            <a href="#features" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 glass-effect text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                    <div class="glass-effect p-6 rounded-xl text-center animate-fade-up" style="animation-delay: 0.4s">
                        <div class="text-3xl font-bold text-white mb-2">10,000+</div>
                        <p class="text-gray-200">Books Available</p>
                    </div>
                    <div class="glass-effect p-6 rounded-xl text-center animate-fade-up" style="animation-delay: 0.5s">
                        <div class="text-3xl font-bold text-white mb-2">500+</div>
                        <p class="text-gray-200">Categories</p>
                    </div>
                    <div class="glass-effect p-6 rounded-xl text-center animate-fade-up" style="animation-delay: 0.6s">
                        <div class="text-3xl font-bold text-white mb-2">24/7</div>
                        <p class="text-gray-200">Access Anytime</p>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="glass-effect py-4 mt-auto">
                <div class="container mx-auto px-4">
                    <p class="text-sm text-center text-white/80">&copy; 2025 ReadSphere. All rights reserved.</p>
                </div>
            </footer>
        </div>

        <!-- Toast Container -->
        <div class="fixed top-20 right-4 z-[60]"> <!-- Increased z-index and top spacing -->
            <!-- Existing toast notifications -->
            <!-- error toast -->
        @if ($errors->any())
        <div class="fixed top-4 right-4 z-50">
            @foreach ($errors->all() as $index => $error)
                <div id="toast-danger-{{ $index }}" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm" role="alert">
                    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger-{{ $index }}" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <!-- toast javascript -->
                <script>
                    setTimeout(function() {
                        const toast = document.getElementById('toast-danger-{{ $index }}');
                        if (toast) {
                            toast.style.display = 'none';
                        }
                    }, 5000);
                </script>
            @endforeach
        </div>
        @endif

        <!-- succuss toast -->
        @if (session('success'))
        <div class="fixed top-4 right-4 z-50">
            <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('success')}}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    const toast = document.getElementById('toast-success');
                    if (toast) {
                        toast.style.display = 'none';
                    }
                }, 5000);
            </div>
        @endif
    </body>
</html>