<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Perpus Modern') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar ala macOS */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900 h-full">
    <div class="fixed top-5 left-1/2 -translate-x-1/2 z-[60] w-full max-w-sm px-4">

        @if (session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-10 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-10 scale-95"
            class="bg-white/80 backdrop-blur-xl border border-gray-200 px-5 py-3 rounded-full shadow-[0_10px_40px_rgba(0,0,0,0.1)] flex items-center gap-3">
            <div class="flex-shrink-0 bg-green-500 rounded-full p-1">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="5 13l4 4L19 7"></path>
                </svg>
            </div>
            <p class="text-sm font-semibold text-gray-800 tracking-tight">{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error') || $errors->any())
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-10 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-10 scale-95"
            class="bg-white/80 backdrop-blur-xl border border-red-100 px-5 py-3 rounded-full shadow-[0_10px_40px_rgba(0,0,0,0.1)] flex items-center gap-3">
            <div class="shrink-0 bg-red-500 rounded-full p-1">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <p class="text-sm font-semibold text-gray-800 tracking-tight">
                {{ session('error') ?? 'Ada masalah pada data lo.' }}
            </p>
        </div>
        @endif
    </div>

    <nav x-data="{ open: false, profileOpen: false }"
        class="sticky top-0 z-50 w-full border-b border-gray-200/50 bg-white/70 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-xl font-bold tracking-tight text-gray-900">
                            Tobias<span class="text-blue-600">.</span>
                        </a>
                    </div>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
                        <a href="{{ route('buku.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 {{ request()->routeIs('buku.*') ? 'border-blue-500' : 'border-transparent hover:border-gray-300' }} transition-colors">
                            Buku
                        </a>
                        <a href="{{ route('siswa.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300 transition-colors">
                            Siswa
                        </a>
                        <a href="{{ route('peminjaman.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300 transition-colors">
                            Peminjaman
                        </a>
                    </div>
                </div>

                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="relative ml-3" @click.away="profileOpen = false">
                        <button @click="profileOpen = !profileOpen" class="flex items-center text-sm focus:outline-none transition-transform active:scale-95">
                            <span class="sr-only">Open user menu</span>
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center border border-gray-300">
                                <span class="text-xs font-bold text-gray-600">AD</span>
                            </div>
                        </button>

                        <div x-show="profileOpen"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-2xl bg-white py-1 shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                            <hr class="my-1 border-gray-100">
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</a>
                        </div>
                    </div>
                </div>

                <div class="flex items-center sm:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open" x-cloak class="sm:hidden bg-white border-b border-gray-200">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('buku.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-blue-700 bg-blue-50">Buku</a>
                <a href="{{ route('siswa.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Siswa</a>
                <a href="{{ route('peminjaman.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Peminjaman</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="animate-fade-in-up">
            @yield('content')
        </div>
    </main>

    <footer class="mt-auto py-8 border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Perpus Tobias Web. Made with &hearts; for beginners.</p>
        </div>
    </footer>

</body>

</html>