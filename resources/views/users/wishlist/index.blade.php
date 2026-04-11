<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wishlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if($wishlistItems->isEmpty())
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 text-gray-400 rounded-full mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Your wishlist is empty</h3>
                        <p class="text-gray-500 mb-6">Seems like you haven't found your perfect pair yet.</p>
                        <a href="{{ route('user.shoes.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition">
                            Explore Catalog
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($wishlistItems as $shoe)
                            <div class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                                <div class="relative bg-gray-50 p-6 flex items-center justify-center aspect-square">
                                    @if($shoe->image)
                                        <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="w-full h-full object-contain drop-shadow-2xl group-hover:scale-110 transition-transform">
                                    @else
                                        <div class="text-gray-300 uppercase font-black tracking-tighter">No Image</div>
                                    @endif

                                    <form action="{{ route('wishlist.toggle', $shoe->id) }}" method="POST" class="absolute top-4 right-4">
                                        @csrf
                                        <button type="submit" class="w-10 h-10 bg-white/80 backdrop-blur text-red-500 rounded-full flex items-center justify-center shadow-md hover:bg-red-500 hover:text-white transition">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <p class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">{{ $shoe->brand }}</p>
                                            <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $shoe->name }}</h3>
                                        </div>
                                    </div>
                                    <p class="text-blue-700 font-black mb-6 italic">IDR {{ number_format($shoe->price, 0, ',', '.') }}</p>
                                    
                                    <div class="flex gap-3">
                                        <a href="{{ route('user.shoes.show', $shoe->id) }}" class="flex-1 text-center py-3 border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 transition">
                                            Details
                                        </a>
                                        <button class="flex-1 py-3 bg-gray-900 text-white rounded-xl text-sm font-bold hover:bg-black transition shadow-lg shadow-gray-200">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>