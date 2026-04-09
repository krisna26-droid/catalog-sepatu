<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Shoe Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="w-56 bg-white border-r border-gray-100 flex flex-col flex-shrink-0">
        <div class="h-14 flex items-center gap-3 px-5 border-b border-gray-100">
            <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2 4h12v1.5H2zm2 3h8v1.5H4zm1 3h6v1.5H5z"/>
                </svg>
            </div>
            <span class="text-sm font-semibold text-gray-800">Admin Panel</span>
        </div>
        <nav class="flex-1 py-4">
            <p class="px-5 text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-2">Menu</p>
            <a href="{{ route('admin.shoes.index') }}"
               class="flex items-center gap-3 px-5 py-2.5 text-sm
                      {{ request()->routeIs('admin.shoes*') 
                         ? 'text-blue-600 bg-blue-50 border-l-2 border-blue-500 font-medium' 
                         : 'text-gray-500 hover:bg-gray-50 border-l-2 border-transparent' }}">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 3h10v2H3zm0 4h10v2H3zm0 4h10v2H3z"/>
                </svg>
                Shoe Management
            </a>
        </nav>
        <div class="p-4 border-t border-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-500 
                               hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- TOPBAR --}}
        <header class="h-14 bg-white border-b border-gray-100 flex items-center justify-between px-6 flex-shrink-0">
            <h1 class="text-sm font-semibold text-gray-700">@yield('page-title', 'Admin — Catalog Sepatu')</h1>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center 
                            text-xs font-semibold text-blue-700">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                </div>
                <span class="text-sm text-gray-500">{{ Auth::user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        {{-- CONTENT --}}
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
                <div class="flex items-center gap-2 bg-green-50 border border-green-200 
                            text-green-700 text-sm px-4 py-3 rounded-lg mb-5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>