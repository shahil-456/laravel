<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;





class TestController extends Controller
{


    public function store(Request $request)
    {
        DB::table('messages')->insert([
            'text' => $request->text,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'ok']);
    }

    public function index()
    {
        $messages = DB::table('messages')->orderByDesc('id')->get();
        return response()->json($messages);
    }








    public function hello()
    {
        $test = new Test();  
        $wordCount = $test->testWord();

        $wordCount = $test->getAll();

        $user_id=1;
        echo $user_id;
        
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
    









}
