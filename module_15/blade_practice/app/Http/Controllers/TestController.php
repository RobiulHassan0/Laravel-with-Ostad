<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function hello(){
        return "Hello from Controller!";
    }

    public function viewTestByController(){
        return view('hello');
    }
}
