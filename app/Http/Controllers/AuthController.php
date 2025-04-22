<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
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

        $wordCount = $test->getAll();

        return view('auth/student_login', ['data' => $wordCount]);

        
        return $wordCount;  
    }



    public function signup()
    {
        $test = new Test();  
        $wordCount = $test->testWord();

        $wordCount = $test->getAll();

        return view('auth/student_login', ['data' => $wordCount]);

        
        return $wordCount;  
    }


    public function submit(Request $request)
    {


       // 'username' => 'required|username|exists:users,email',

        // Validate the request
        // $request->validate([
        //     'username' => 'required|username',
        //     'password' => 'required|min:6',
        // ], 



        $request->validate([
            'username' => 'required|string|min:5|max:20',
        ]);
        
        
        // [
        //     'email.exists' => 'The provided email is not registered.',
        // ]

         $username = $request->username;


        //  print_r($username);


        // Find the user
        $user = User::where('username', $request->username)->first();

        // print_r($user);die;


        if ($this->checkCredentials($request->username, $request->password)) {

            echo 2;die;
            return redirect()->route('login')->with('success', 'Login successful');

        }else{

            return back()->with('error', 'Invalid username or password !');

        }



        // Check password
        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid email or password.',
        //     ]);
        // }

        // Store user in session
        Session::put('user_id', $username);
        // Session::put('user_name', $user->name);
        // Session::put('user_email', $user->email);

        // Authenticate user using Laravel Auth
        // Auth::login($username);

        // Redirect to dashboard or intended URL
        return redirect()->intended(route('home'))->with('success', 'Login successful');
    
    }




    public function checkCredentials($username, $password)
    {

        // $user = User::where('username', $request->username)->first();

        // Try to login with email or username
     

        if (Auth::attempt(['username' => $username, 'password' => $password]) || 
            Auth::attempt(['username' => $username, 'password' => $password])) {
            return true; 
        }
        return false; // Invalid credentials
    }






}
