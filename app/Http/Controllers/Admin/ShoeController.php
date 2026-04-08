<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shoe;
use Illuminate\Support\Facades\Storage;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shoes = Shoe::query()
        ->when($request->search, fn($q, $search) =>
            $q->where('name', 'like', "%$search%")
              ->orWhere('brand', 'like', "%$search%")
        )
        ->latest()
        ->paginate(6);

    return view('admin.shoes.index', compact('shoes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('shoes', 'public');
        }

        Shoe::create($validated);

        return redirect()->route('admin.shoes.index')
                         ->with('success', 'Sepatu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shoe $shoe) 
    {
        return view('admin.shoes.edit', compact('shoe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shoe $shoe)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Ganti foto jika ada upload baru
        if ($request->hasFile('image')) {
            // Hapus foto lama
            if ($shoe->image) {
                Storage::disk('public')->delete($shoe->image);
            }
            $validated['image'] = $request->file('image')->store('shoes', 'public');
        }

        $shoe->update($validated);

        return redirect()->route('admin.shoes.index')
                        ->with('success', 'Data sepatu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shoe $shoe)
    {
        // Hapus foto jika ada
        if ($shoe->image) {
            Storage::disk('public')->delete($shoe->image);
        }

        $shoe->delete();

        return redirect()->route('admin.shoes.index')
                         ->with('success', 'Sepatu berhasil dihapus!');
    }
}
