<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $filename;

    public function __construct()
    {
        $this->filename = 'hello.txt';
    }

    public function index( Request $request ) : object
    {
        $msg = 'please input text:';

        if ( $request->isMethod( 'post' ) ) {
            $msg = 'you typed: "' . $request->input( 'msg' ) . '"';
        }

        $data = [
            'msg'  => $msg,
        ];

        return view( 'hello.index', $data );
    }
}
