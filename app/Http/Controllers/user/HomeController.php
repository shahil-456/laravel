<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\File;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class HomeController extends Controller
{
    public function home()
    {
        $test = new Test();  

        $data = DB::table('products')->get();
        // return view('your_view', ['data' => $data]);

        $wordCount = $test->getAll();  


        return view('user.pages.home', ['products' => $data]);



    }


    public function test($id="")
    {

        echo 'aka';

    }


    public function profile()
    {
        $user_id = session('user_id');

        $user = Auth::user();

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
    $user->whatsapp = $request->whatsapp;
    $user->instagram = $request->instagram;
    $user->telegram = $request->telegram;
    $user->address = $request->address;



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
