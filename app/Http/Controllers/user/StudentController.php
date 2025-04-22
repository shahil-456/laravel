<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;


class StudentController extends Controller
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
            'phone' => 'required|string|max:15',
        ]);


        Test::insertUser($request->all());

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

        return view('auth/user_login', ['data' => $wordCount]);

        
        return $wordCount;  
    }









}
