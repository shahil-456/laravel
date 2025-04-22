<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    
    use HasFactory;
    protected $fillable = ['username', 'phone'];












    


    // Define a custom function
    public function testWord()
    {
        return 'hello1';
    }

    public function getAll()
    {
        return test::all();  

    }


    public static  function  insertUser($data)
    {
        return self::create([
            'username' => $data['username'],
            'phone' => $data['phone']
        ]);
    }


}