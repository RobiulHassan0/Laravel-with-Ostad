<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function test(){
        return view('pages.portfolio');
    }

    public function helloWorld(){
        $name = 'Robin';
        return view('hello', [
            'name' => $name
        ]);
    }
}
