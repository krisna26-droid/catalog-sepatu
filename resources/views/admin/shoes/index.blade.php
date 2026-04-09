@extends('layouts.admin')

@section('page-title', 'Shoe Management')

@section('content')

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

            {{-- CONTENT --}}
            <div class="mt-4">
                <h3 class="text-lg font-bold text-gray-900 truncate">
                    {{ $shoe->name }}
                </h3>

                <p class="text-blue-600 text-lg font-extrabold mt-1">
                    Rp {{ number_format($shoe->price, 0, ',', '.') }}
                </p>

                {{-- STOCK --}}
                <div class="mt-3">
                    @if($shoe->stock <= 0)
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold">
                            Out of Stock
                        </span>
                    @elseif($shoe->stock <= 5)
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold">
                            Low Stock: {{ $shoe->stock }}
                        </span>
                    @else
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">
                            In Stock: {{ $shoe->stock }}
                        </span>
                    @endif
                </div>
            </div>

        </div>

    @empty
        <div class="col-span-full text-center py-20 bg-white rounded-xl shadow">
            <p class="text-gray-500 italic">No shoes available.</p>
        </div>
    @endforelse

</div>

<div class="mt-6">
    {{ $shoes->links() }}
</div>

@endsection