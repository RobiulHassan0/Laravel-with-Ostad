<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DemoController extends Controller
{
    public function DemoAction1(){
        return "Hello";
    }

    public function DemoAction2(Request $request){
        return "Hello2";
    }
    public function DemoAction3(Request $request){
        return "Hello3";
    }
    public function DemoAction4(Request $request){
        return "Hello4";
    }




}
