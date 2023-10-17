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

    public function index() : object
    {
        $sample_msg  = Storage::disk( 'public' )->url( 'hello.txt' );
        $sample_data = Storage::disk( 'public' )->get( $this->filename );
        $data = [
            'msg'  => $sample_msg,
            'data' => explode( PHP_EOL, $sample_data ),
        ];

        return view( 'hello.index', $data );
    }

    public function other( $msg ) : object
    {
        Storage::disk( 'public' )->append( $this->filename, $msg );
        return redirect()->route( 'hello' );
    }
}
