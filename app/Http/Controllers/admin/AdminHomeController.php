<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Controllers\Controller; 
use App\Models\User;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


class AdminHomeController extends Controller
{
    public function home()
    {
        $test = new Test();  

        $data = DB::table('users')->get();
        // return view('your_view', ['data' => $data]);

        $wordCount = $test->getAll();  


        return view('admin.pages.home', ['users' => $data]);

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
    
        return view('student.pages.profile', ['data' => $userdata]);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        session()->flash('success', 'Your operation was successful!');

        return back()->with('success', 'Profile updated successfully.');
    }

}
