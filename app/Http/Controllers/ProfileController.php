<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Cookie;

class ProfileController extends Controller
{
    //the index method that  accepts the 'id' parameter
    public function index($id)

    {
        //declare vairables
        $name="Donal Trump";
        $age="75";
        //store the data in an associative array
        $data=[
            'id'=>$id,
            'name'=>$name,
            'age'=>$age
        ];
        //create a cookie with the specified parameter
        $cookie=cookie(
                'access_token',     // cookie name
                '123-XYZ',          //cookie value
                1,                  // expiration in minutes( 1 minute)   
                '/',                 //path
                $_SERVER['SERVER_NAME'], //Domain
                false,              //secure ( not using HTTPS)
                true                //httpOnly ( accessible only via HTTP, not Javascript)
        );

        //return the data with a 200 status code and the cookie attached
        return response()->json($data,200)->cookie($cookie);
    }
}
