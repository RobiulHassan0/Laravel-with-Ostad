<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DemoController extends Controller
{
    public function DemoAction() {
        return response('hello')
        ->header('key1', 'value1')
        ->header('key2', 'value2')
        ->header('key3', 'value3')
        ->header('key4', 'value4');
    }

    public function demo() {
        return view('Home');
    }



    public function sessionPut(Request $request, $email): bool {
        $email = $request->email;

        $request->session()->put('userEmail', $email); 
        return true;
    }

    public function sessionGet(Request $request) : string{
        return $request->session()->get('userEmail', 'default');
    }

    public function sessionPull(Request $request):string {
        return $request->session()->pull('userEmail', 'default');
    }

    public function sessionForget(Request $request):bool{
        $request->session()->forget('userEmail');
        return true;
    }

    public function sessionFlush(Request $request):bool{
        $request->session()->flush();
        return true;
    }






}
