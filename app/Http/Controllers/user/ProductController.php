<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Models\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




class ProductController extends Controller
{
    public function add_product()
    {
       
        return view('user.pages.add-product', ['data' =>'ajka']);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            // 'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:3000',
            // 'uploaded_by' => 'required|integer',
        ]);
    
        $imagePath = $request->file('image')->store('products', 'public');
    
        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'link' => $request->link,
            'stock' =>1,
            'image' => $imagePath,
            'uploaded_by' => auth()->user()->user_id,
            'contact' => auth()->user()->phone,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Product added successfully');
    }
    




    public function details($id)
    {
        $product = DB::table('products')->where('id', $id)->first();


        if ($product) {
            $user = DB::table('users')->where('user_id', $product->uploaded_by)->first();
            $product->uploader_name = $user ? $user->username : null;
        }
        

        

        return view('user.pages.product-details', ['product' => $product]);
    }
    





    public function profile()
    {
        $user_id = session('user_id');

        $user = Auth::user(); // logged-in user

        // echo $user;die;
    
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your profile.');
        }
    
        $userdata = User::find($user_id);

    
        if (!$userdata) {
            return redirect()->route('home')->with('error', 'User  not found.');
        }
    
        return view('user.pages.profile', ['data' => $userdata]);
    }


    public function updateProfile(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'username' => 'required|string|max:255',
        // 'email' => 'required|email|unique:users,email,' . Auth::id(),
        'profile_pic' => 'nullable|mimes:jpg,png,jpeg|max:5048', 
    ]);

    $user = Auth::user();

    $user->username = $request->username;
    $user->email = $request->email;
    $user->phone = $request->phone;

    if ($request->hasFile('profile_pic')) {
        $fileName = time() . '_' . $request->profile_pic->getClientOriginalName();
        
        $filePath = $request->file('profile_pic')->storeAs('uploads', $fileName, 'public');

        $user->profile_pic = '/storage/' . $filePath;
    }

    // Save the updated user data
    $user->save();

    session()->flash('success', 'Your operation was successful!');

    return back()->with('success', 'Profile updated successfully.');
}

}
