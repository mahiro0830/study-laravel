<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index( Request $request ) : object
    {
        $data = [
            'msg' => $request->hello,
        ];

        return view('hello.index', $data);
    }

    public function other( Request $request ) : object
    {
        $data = [
            'msg' => $request->bye,
        ];

        return view('hello.index', $data);
    }
}
