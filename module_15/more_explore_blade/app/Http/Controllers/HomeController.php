<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function page(Request $request){

        $num1 = $request->num1;
        $num2 = $request->num2;
        $sum = $num1 + $num2;

        $data = ['result' => $sum];
        return view("Condition", $data);
    }

    public function looping(){
        $data = [
            ['name' => 'Jhone', 'city' => 'London'],
            ['name' => 'jack', 'city' => 'Paris'],
            ['name' => 'Robin', 'city' => 'Dhaka'],
            ['name' => 'Angel', 'city' => 'Kabul'],
        ];
        return view("Loop", ['users' => $data]);
    }

    public function assetAccess(){
        return view('Assets');
    }

    public function showPage(){
        return view('Home');
    }
}
