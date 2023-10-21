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
        $sample_msg          = Storage::disk( 'public' )->url( 'hello.txt' );
        $sample_data         = Storage::disk( 'public' )->get( $this->filename );
        $sample_size         = Storage::disk( 'public' )->size( $this->filename );
        $sample_lastModified = Storage::disk( 'public' )->lastModified( $this->filename );
        $data = [
            'msg'          => $sample_msg,
            'data'         => explode( PHP_EOL, $sample_data ),
            'size'         => $sample_size,
            'lastModified' => date( 'Y.m.d', $sample_lastModified ),
        ];

        return view( 'hello.index', $data );
    }

    public function other( $msg ) : object
    {
        if ( Storage::disk( 'public' )->exists( 'bk_' . $this->filename ) ) {
            Storage::disk( 'public' )->delete( 'bk_' . $this->filename );
        }
        Storage::disk( 'public' )->copy( $this->filename, 'bk_' . $this->filename );
        
        if ( Storage::disk( 'local' )->exists( 'bk_' . $this->filename ) ) {
            Storage::disk( 'local' )->delete( 'bk_' . $this->filename );
        }
        Storage::disk( 'local' )->move( 'public/bk_' . $this->filename, 'bk_' . $this->filename );

        return redirect()->route( 'hello' );
    }
}
