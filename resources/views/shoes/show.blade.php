<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Exploration') }}
            </h2>
            <a href="{{ route('user.shoes.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 hover:text-blue-800 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Catalog
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    
                    <div class="bg-gray-50 p-12 flex items-center justify-center border-r border-gray-100 relative group">

                        @if($shoe->image)
                            <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="relative z-10 w-full h-auto max-h-[550px] object-contain drop-shadow-[0_35px_35px_rgba(0,0,0,0.25)] transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="relative z-10 w-full h-96 bg-gray-200 rounded-3xl flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-20 h-20 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="font-bold uppercase tracking-widest text-xs">Visual Unavailable</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-12 lg:p-20 flex flex-col justify-center">
                        <div class="mb-6 flex items-center gap-3">
                            <span class="px-4 py-1.5 bg-blue-600 text-white text-[10px] font-bold rounded-full uppercase tracking-[0.2em]">
                                {{ $shoe->brand }}
                            </span>
                            <span class="text-gray-300">/</span>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Premium Collection</span>
                        </div>

                        <h1 class="text-5xl font-bold text-gray-900 leading-[1.1] mb-4">
                            {{ $shoe->name }}
                        </h1>

                        <div class="flex items-baseline gap-2 mb-10">
                            <span class="text-sm font-bold text-blue-600 uppercase">Price:</span>
                            <p class="text-4xl font-bold text-blue-600">
                                IDR {{ number_format($shoe->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="space-y-8 mb-12">
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase mb-4">The Story</h3>
                                <p class="text-gray-600 leading-relaxed italic text-xl font-medium border-l-4 border-gray-100 pl-6">
                                    {{ $shoe->description ?? 'Crafted for those who demand excellence. This pair combines high-performance engineering with street-ready aesthetics for the ultimate footwear experience.' }}
                                </p>
                            </div>

                            <div class="flex items-center gap-8 py-6 border-y border-gray-50">
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase mb-1">Stock Status</span>
                                    @if($shoe->stock <= 0)
                                        <span class="text-sm font-bold text-red-500 uppercase italic">Sold Out</span>
                                    @else
                                        <span class="text-sm font-bold text-green-600 uppercase italic">{{ $shoe->stock }} Pairs Ready</span>
                                    @endif
                                </div>
                                <div class="w-px h-10 bg-gray-100"></div>
                                
                            </div>
                        </div>

            
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>