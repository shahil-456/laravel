<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MongoDb extends Model
{
    
    use HasFactory;

    // Define a custom function
    public function testWord()
    {
        // Assuming the 'content' column contains the text
        return 'hello1';
    }

    public function getAll()
    {
        return test::all();  

    }

    

}