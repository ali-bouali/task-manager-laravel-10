<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Task Manager') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50">
            @if (Route::has('login'))
                <nav class="flex justify-end p-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ms-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif

            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-6xl font-bold text-gray-900 mb-6">
                        Task Manager
                    </h1>
                    <p class="text-xl text-gray-600 mb-12 max-w-2xl mx-auto">
                        Organize your tasks efficiently with our modern, intuitive task management system. Stay productive and never miss a deadline.
                    </p>

                    <div class="flex justify-center gap-4 mb-16">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Get Started
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:bg-gray-50 active:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Sign In
                            </a>
                        @endauth
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                        <div class="bg-white p-8 rounded-xl shadow-lg">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Organize Tasks</h3>
                            <p class="text-gray-600">Create, update, and manage your tasks with ease. Set priorities and deadlines to stay on track.</p>
                        </div>

                        <div class="bg-white p-8 rounded-xl shadow-lg">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Categorize</h3>
                            <p class="text-gray-600">Group your tasks with custom categories and color coding for better organization.</p>
                        </div>

                        <div class="bg-white p-8 rounded-xl shadow-lg">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Track Progress</h3>
                            <p class="text-gray-600">Monitor your productivity with comprehensive statistics and insights on your dashboard.</p>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="absolute bottom-0 w-full py-6 text-center text-sm text-gray-500">
                <p>Built with Laravel & Tailwind CSS</p>
            </footer>
        </div>
    </body>
</html>
