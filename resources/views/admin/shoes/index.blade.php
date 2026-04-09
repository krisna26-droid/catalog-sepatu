@extends('layouts.admin')

@section('page-title', 'Shoe Management')

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

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">Shoe Management</h2>

    <a href="{{ route('admin.shoes.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow">
        + Add New Shoe
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @forelse($shoes as $shoe)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition p-5 border">

            {{-- IMAGE + ACTION --}}
            <div class="relative">

                @if($shoe->image)
                    <img src="{{ asset('storage/' . $shoe->image) }}"
                         class="rounded-lg h-48 w-full object-cover">
                @else
                    <div class="h-48 bg-gray-200 flex items-center justify-center rounded-lg text-gray-400">
                        No Image
                    </div>
                @endif

                {{-- BRAND --}}
                <span class="absolute top-2 left-2 bg-white/80 px-2 py-1 rounded text-xs font-bold shadow">
                    {{ $shoe->brand }}
                </span>

                {{-- ACTION --}}
                <div class="absolute top-2 right-2 flex gap-2 z-10">
                    <a href="{{ route('admin.shoes.edit', $shoe) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-white text-[10px] px-2 py-1 rounded shadow">
                        Edit
                    </a>

                    <form action="{{ route('admin.shoes.destroy', $shoe) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white text-[10px] px-2 py-1 rounded shadow">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-xl shadow-sm border border-gray-100">
                <p class="text-gray-500 text-lg italic">No shoes found.</p>
            </div>
        @endforelse
    </div>

        </div>

    @empty
        <div class="col-span-full text-center py-20 bg-white rounded-xl shadow">
            <p class="text-gray-500 italic">No shoes available.</p>
        </div>
    @endforelse

</div>
@endsection