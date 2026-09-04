<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function homePage(){
        return Inertia::render('Home',  [
            'version' => '1.0.1',
            'greet' => 'Hello'
        ]);
    }


}
