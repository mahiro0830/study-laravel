<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index( Person $person ) : object
    {
        $data = [
            'msg' => $person,
        ];

        return view('hello.index', $data);
    }
}
