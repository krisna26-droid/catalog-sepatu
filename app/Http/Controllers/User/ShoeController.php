<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    public function index(Request $request) {
        $query = Shoe::query();

        // filter
        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand', $request->brand);
        }

        $shoes = $query->latest()->paginate(6);

        $brands = Shoe::select('brand')->distinct()->pluck('brand');

        return view('users.shoes.index', compact('shoes', 'brands'));
    }

    public function show($id) {
        $shoe = Shoe::findOrFail($id);
        return view('users.shoes.show', compact('shoe'));
    }
}
