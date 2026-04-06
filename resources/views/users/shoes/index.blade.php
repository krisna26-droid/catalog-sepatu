<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest Footwear Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <form action="{{ route('user.shoes.index') }}" method="GET" class="flex items-center gap-4">
                    <select name="brand" class="rounded-md border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                {{ $brand }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                        Filter
                    </button>
                    @if(request('brand'))
                        <a href="{{ route('user.shoes.index') }}" class="text-sm text-gray-500 hover:text-red-500 underline">
                            Reset
                        </a>
                    @endif
                </form>
                
                <div class="text-sm text-gray-500 font-medium">
                    Showing {{ $shoes->count() }} of {{ $shoes->total() }} products
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($shoes as $shoe)
                    <div class="bg-white overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 rounded-xl p-5 border border-gray-100">
                        <div class="relative">
                            @if($shoe->image)
                                <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="rounded-lg h-56 w-full object-cover">
                            @else
                                <div class="rounded-lg h-56 w-full bg-gray-200 flex items-center justify-center text-gray-400">
                                    <span>No Image Available</span>
                                </div>
                            @endif
                            <span class="absolute top-2 right-2 bg-white/80 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-gray-700 shadow-sm">
                                {{ $shoe->brand }}
                            </span>
                        </div>

                        <div class="mt-4">
                            <h3 class="text-lg font-extrabold text-gray-900 truncate">{{ $shoe->name }}</h3>
                            <p class="text-blue-600 text-xl font-black mt-2">
                                IDR {{ number_format($shoe->price, 0, ',', '.') }}
                            </p>
                            
                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    @if($shoe->stock <= 0)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-100 text-red-700 border border-red-200 uppercase">
                                            Out of Stock
                                        </span>
                                    @elseif($shoe->stock <= 5)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 border border-amber-200 uppercase">
                                            Low Stock: {{ $shoe->stock }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 border border-green-200 uppercase">
                                            In Stock: {{ $shoe->stock }}
                                        </span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('user.shoes.show', $shoe->id) }}" 
                                class="inline-flex items-center px-4 py-2 {{ $shoe->stock <= 0 ? 'bg-gray-300 cursor-not-allowed' : 'bg-gray-900 hover:bg-black' }} rounded-lg font-bold text-[10px] text-white uppercase tracking-wider transition-all duration-200">
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-xl shadow-sm">
                        <p class="text-gray-500 text-lg italic">It seems our collection is empty at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $shoes->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-app-layout>