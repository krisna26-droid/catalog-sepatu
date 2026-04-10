<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 overflow-hidden shadow-lg rounded-2xl">
                <div class="p-8 lg:p-12 text-white flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-6 md:mb-0">
                        <h1 class="text-3xl lg:text-4xl font-bold mb-2 uppercase tracking-tight">
                            Ready for a new pair?
                        </h1>
                        <p class="text-blue-100 text-lg">
                            Explore our latest arrivals and find the perfect fit for your style.
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('user.shoes.index') }}" class="inline-block bg-white text-blue-700 px-8 py-3 rounded-xl font-bold uppercase tracking-wider hover:bg-gray-100 transition shadow-md active:scale-95">
                                Browse Full Catalog
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block opacity-20 transform rotate-12">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 16.5C21 16.88 20.79 17.21 20.47 17.38L12.57 21.82C12.41 21.94 12.21 22 12 22C11.79 22 11.59 21.94 11.43 21.82L3.53 17.38C3.21 17.21 3 16.88 3 16.5V7.5C3 7.12 3.21 6.79 3.53 6.62L11.43 2.18C11.59 2.06 11.79 2 12 2C12.21 2 12.41 2.06 12.57 2.18L20.47 6.62C20.79 6.79 21 7.12 21 7.5V16.5Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1">New Arrivals</h3>
                    <p class="text-gray-500 text-sm">Check out the freshest drops from Nike, Adidas, and more.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1">Flash Sales</h3>
                    <p class="text-gray-500 text-sm">Limited time offers exclusively for registered members.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1">Free Returns</h3>
                    <p class="text-gray-500 text-sm">Not the right fit? Enjoy our 30-day free return policy.</p>
                </div>
            </div>

            <div class="space-y-10">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900">Featured Arrivals</h2>
                    <a href="{{ route('user.shoes.index') }}" class="text-blue-600 font-bold hover:underline">View Full Catalog &rarr;</a>
                </div>

                <div class="space-y-8">
                    @forelse($latestShoes as $shoe)
                        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 group transition-all hover:shadow-xl hover:border-blue-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                                
                                <div class="bg-gray-50 p-6 flex items-center justify-center border-r border-gray-50 relative">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 bg-white/80 backdrop-blur text-gray-600 text-[10px] font-bold rounded-full uppercase tracking-widest shadow-sm">
                                            {{ $shoe->brand }}
                                        </span>
                                    </div>
                                    
                                    @if($shoe->image)
                                        <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="w-full h-64 object-contain drop-shadow-2xl transition-transform duration-500 group-hover:scale-105">
                                    @else
                                        <div class="w-full h-64 bg-gray-200 rounded-2xl flex items-center justify-center text-gray-400">
                                            <span class="text-sm font-bold uppercase tracking-tighter">No Image</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <h3 class="text-2xl font-bold text-gray-900 leading-tight mb-1">
                                        {{ $shoe->name }}
                                    </h3>
                                    
                                    <p class="text-xl font-bold text-blue-600 mb-4">
                                        IDR {{ number_format($shoe->price, 0, ',', '.') }}
                                    </p>

                                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-6 italic">
                                        {{ $shoe->description ?? 'Discover unparalleled comfort and timeless style with this exclusive edition.' }}
                                    </p>

                                    <div class="flex items-center justify-between gap-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full {{ $shoe->stock > 0 ? 'bg-green-500' : 'bg-red-500' }}"></div>
                                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">
                                                {{ $shoe->stock > 0 ? 'In Stock' : 'Sold Out' }}
                                            </span>
                                        </div>
                                        
                                        <a href="{{ route('user.shoes.show', $shoe->id) }}" class="px-6 py-3 bg-gray-900 text-white text-[11px] font-bold uppercase tracking-widest rounded-xl hover:bg-black transition-all active:scale-95 shadow-lg shadow-gray-200">
                                            View Product
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                            <p class="text-gray-400 italic font-medium">New collection is coming soon.</p>
                        </div>
                    @endforelse
                </div>

                <div class="flex justify-center pt-4">
                    <a href="{{ route('user.shoes.index') }}" class="group inline-flex items-center gap-4 bg-blue-600 text-white px-12 py-5 rounded-xl font-bold uppercase tracking-widest hover:bg-blue-700 transition-all shadow-2xl shadow-blue-200 active:scale-95">
                        See More Choices
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>