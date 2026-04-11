<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = auth()->user()->wishlists()->latest()->get();
        return view('users.wishlist.index', compact('wishlistItems'));

    }

    public function toggle(Request $request, $shoeId)
    {
        $user = auth()->user();

        $user->wishlists()->toggle($shoeId);

        return back()->with('success', 'Wishlist updated!');
    }
}
