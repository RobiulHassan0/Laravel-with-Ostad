<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $name = 'Robin';
        $age = 25;

        return view('test.test', [
            'myName' => $name,
            'myAge' => $age
        ]);
    }

    public function dataPassByCompact(){
        $firstName = 'Robiul';
        $lastName = 'Hassan';

        return view('test.test', compact('firstName', 'lastName'));
    }

    public function complexDataPass(){
        $address = 'Dhaka, Bangladesh';

        $info = [
            'name' => 'Robin',
            'age' => 27,
            'address' => $address
        ];
        $proffession = 'Web DEveloper';

        return view('test.test', [
            'information' => $info,
            'proff' => $proffession
        ]);
    }

    public function complexDataPassByCompact(){
        $address = 'Dhaka, Bangladesh';

        $info = [
            'name' => 'Robin',
            'age' => 27,
            'address' => $address
        ];
        $proffession = 'Web DEveloper';

        return view('test.test', compact('info', 'proffession'));
    }

    public function dataPassByUsingWith(){
        return view('test.test')->with('greeting', 'Hello World')->with('name', 'Robin');
    }
}

