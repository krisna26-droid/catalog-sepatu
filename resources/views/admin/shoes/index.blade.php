@extends('layouts.admin')

@section('page-title', 'Daftar Sepatu')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="mb-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-4">
        <h2 class="text-xl font-extrabold text-gray-900">Manage Shoes</h2>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <form method="GET" class="flex w-full md:w-64">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search shoes..."
                       class="w-full rounded-l-md border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500">
                <button class="bg-gray-100 px-4 py-2 border border-l-0 border-gray-300 rounded-r-md text-sm font-semibold hover:bg-gray-200">
                    Search
                </button>
            </form>

            <a href="{{ route('admin.shoes.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-blue-700 transition uppercase tracking-wider whitespace-nowrap">
                + Add Shoe
            </a>
        </div>
    </div>

    {{-- GRID: 3 Kolom Persis User --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($shoes as $shoe)
            <div class="bg-white overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 rounded-xl p-5 border border-gray-100">
                
                {{-- IMAGE: Tinggi h-56 & Badge Brand --}}
                <div class="relative">
                    @if($shoe->image)
                        <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="rounded-lg h-56 w-full object-cover">
                    @else
                        <div class="rounded-lg h-56 w-full bg-gray-200 flex items-center justify-center text-gray-400">
                            <span class="text-xs font-bold uppercase">No Image Available</span>
                        </div>
                    @endif
                    {{-- Badge Brand: text-xs sesuai user --}}
                    <span class="absolute top-2 right-2 bg-white/80 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-gray-700 shadow-sm">
                        {{ $shoe->brand }}
                    </span>
                </div>

                <div class="mt-4">
                    {{-- Judul & Harga: Font & Margin disamakan --}}
                    <h3 class="text-lg font-extrabold text-gray-900 truncate">{{ $shoe->name }}</h3>
                    <p class="text-blue-600 text-xl font-black mt-2">
                        IDR {{ number_format($shoe->price, 0, ',', '.') }}
                    </p>
                    
                    {{-- FOOTER: Label Stok & Tombol Aksi --}}
                    <div class="flex items-center justify-between mt-4 gap-2">
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
                        
                        {{-- Tombol: Ukuran font [10px] & padding disesuaikan agar muat berdua --}}
                        <div class="flex gap-1">
                            <a href="{{ route('admin.shoes.edit', $shoe) }}" 
                               class="inline-flex items-center px-3 py-2 bg-gray-900 hover:bg-black rounded-lg font-bold text-[10px] text-white uppercase tracking-wider transition-all">
                                Edit
                            </a>

                            <form action="{{ route('admin.shoes.destroy', $shoe) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 rounded-lg font-bold text-[10px] text-white uppercase tracking-wider transition-all">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-xl shadow-sm border border-gray-100">
                <p class="text-gray-500 text-lg italic">No shoes found.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $shoes->withQueryString()->links() }}
    </div>
</div>
@endsection