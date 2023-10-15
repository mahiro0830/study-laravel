<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index($id) :object
    {
        $data = [
            'msg' => 'this is sample message',
            'id'  => $id,
        ];

        return view('hello.index', $data);
    }

    public function other() :object
    {
        return redirect()->route('hello');
    }
}
