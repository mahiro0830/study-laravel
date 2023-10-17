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
        $this->filename = 'sample.txt';
    }

    public function index() : object
    {
        $sample_msg  = $this->filename;
        $sample_data = Storage::get( $this->filename );
        $data = [
            'msg'  => $sample_msg,
            'data' => explode( PHP_EOL, $sample_data ),
        ];

        return view( 'hello.index', $data );
    }

    public function other( $msg ) : object
    {
        Storage::append( $this->filename, $msg );
        return redirect()->route( 'hello' );
    }
}
