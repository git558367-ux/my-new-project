<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $productCount = Product::count();

        return view('admin.index', compact('userCount', 'productCount'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function editProfile()
    {
        return view('admin.users.edit');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if ($user->image && file_exists(public_path('storage/' . $user->image))) {
                unlink(public_path('storage/' . $user->image));
            }

            $image = $request->file('image')->store('profile', 'public');
            $user->image = $image;
        }

        $user->name = $request->name;
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile Updated Successfully!');
    }
}