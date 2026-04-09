@extends('layouts.admin')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Shoe</h2>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.shoes.update', $shoe) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Shoe Name</label>
                <input type="text" name="name" value="{{ old('name', $shoe->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                <input type="text" name="brand" value="{{ old('brand', $shoe->brand) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $shoe->price) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $shoe->stock) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $shoe->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>

                {{-- Tampilkan foto lama jika ada --}}
                @if($shoe->image)
                    <img src="{{ Storage::url($shoe->image) }}" 
                         class="w-32 h-32 object-cover rounded mb-2 border">
                    <p class="text-xs text-gray-400 mb-2">Leave blank if you don't want to change the image.</p>
                @endif

                <input type="file" name="image" accept="image/*"
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded font-medium">
                    Update
                </button>
                <a href="{{ route('admin.shoes.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection