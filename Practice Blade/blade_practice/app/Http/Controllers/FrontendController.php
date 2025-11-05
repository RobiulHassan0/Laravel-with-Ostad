<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $pageName = '<Home>';
        // $htmlCode = '<h2>Welcome to Home</h2>';
        $age = null;

        $userList = [
            // [
            //     'name' => 'Panda',
            //     'age' => 6,
            // ],
            // [
            //     'name'=> 'Fox',
            //     'age'=> 5,
            // ],
            // [
            //     'name' => 'Dog',
            //     'age' => 8,
            // ],
            // [
            //     'name'=> 'Cat',
            //     'age'=> 2,
            // ]
        ];

        return view("home", [
            'pageName' => $pageName,
            'Myage' => $age,
            'userList'=> $userList
        ]);
    }

    public function about(){
        return view("about");
    }
}
