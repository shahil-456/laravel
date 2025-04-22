<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;




class LoginController extends Controller
{



    public function landing_page(Request $request)
    {


        return view('main', ['data' => 'a']);


    }


    public function products(Request $request)
    {

        $data = DB::table('products')->orderby('id','asc')->get();


        return view('products', ['products' => $data]);


    }





    public function productDetails($id = "")
{

    $data = DB::table('products')->where('id', $id)->first();

    $userdata = DB::table('users')->where('user_id', $data->uploaded_by)->first();

    return view('product-details', [
        'product' => $data,
        'userdata' => $userdata
    ]);
}




    public function hello()
    {
        $test = new Test();  
        $wordCount = $test->testWord();

        $wordCount = $test->getAll();

        return view('welcome', ['data' => $wordCount]);

        
        return $wordCount;  
    }


    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string|max:255',
        ]);



        // Test::insertUser($request->all());

        // Save the data to the database (you can customize the model and table as needed)
        // Test::create([
        //     'name' => $request->username,
        //     'pass' => $request->phone,
        // ]);
    
        return back()->with('success', 'Form submitted successfully!');
    }






    public function login()
    {
        $test = new Test();  
        $wordCount = $test->testWord();

        if (Auth::check()) {
            return redirect()->route('home'); 
        }

        $wordCount = $test->getAll();

        return view('auth/user_login', ['data' => $wordCount]);

        return $wordCount;  
    }



    public function signup()
    {
        $test = new Test();  
        $wordCount = $test->testWord();

        $wordCount = $test->getAll();

        return view('auth/user_signup', ['data' => $wordCount]);

        
        return $wordCount;  
    }


    public function submit1(Request $request)
    {

        $request->validate([
            'username' => 'required|username|exists:users,username|string|min:5|max:20',
             'password' => 'required|min:6',

        ]);
        
         $username = $request->username;

        $user = User::where('username', $request->username)->first();

        if ($this->checkCredentials($request->username, $request->password)) {

            Session::put('user_id', $user->user_id);

            return redirect()->route('home')->with('success', 'Login successful');

        }else{

            return back()->with('error', 'Invalid username or password !');

        }

        Auth::login($user);

        return redirect()->intended(route('home'))->with('success', 'Login successful');
    
    }



    public function submit(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username|min:5|max:20',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            
    
            if ($request->has('remember_me')) {
                Cookie::queue('username', $request->username, 43200); // 30 days
            } else {
                Cookie::queue(Cookie::forget('username'));
            }
    
            $user = User::where('username', $request->username)->first();
            Session::put('user_id', $user->user_id);
    
            return redirect('user/home');
        }
    
        return back()->with('error', 'Invalid username or password!');
    }
    



    public function checkCredentials($username, $password)
    {

        if (Auth::attempt(['username' => $username, 'password' => $password]) 
            ) {
            return true; 
        }
        return false; // Invalid credentials
    }


    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users|min:6',
            'email' => [ 'required', 'email:dns', 'unique:users', 'regex:/^[\w.+\-]+@gmail\.com$/i' ],
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|digits_between:8,12',
        ]);
    
        $user_id = strtoupper(Str::random(5));
    
        User::create([
            'user_id' => $user_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'whatsapp' => 'https://wa.me/'.$request->phone,

        ]);
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->has('remember'))) {

           


            return redirect()->route('home');
        }
    
        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }
    

    public function logout(Request $request)

    {


        Auth::logout();


        $request->session()->invalidate();
        // Regenerate the session token to prevent session fixation attacks

        $request->session()->regenerateToken();

        // Redirect to the login page or any other page

        return redirect()->route('login')->with('status', 'You have been logged out successfully.');

    }




    public function admin_login()
    {
        $test = new Test();  
        $wordCount = $test->testWord();

        $wordCount = $test->getAll();

        return view('auth/admin_login', ['data' => $wordCount]);

        
        return $wordCount;  
    }



    public function adminSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|string|exists:admins,email|min:5|max:20',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            
            
            if ($request->has('remember_me')) {
                Cookie::queue('email', $request->email, 43200); // 30 days
            } else {
                Cookie::queue(Cookie::forget('username'));
            }
    
            $user = User::where('email', $request->email)->first();
            // Session::put('user_id', $user->user_id);

            // die;
    
            return redirect('admin/home');
        }else{
                echo 11;
            die;
        }
    
        return back()->with('error', 'Invalid username or password!');
    }
    




}
