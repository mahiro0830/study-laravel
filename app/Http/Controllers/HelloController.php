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
        $dir = '/';
        $all = Storage::disk( 'local' )->allFiles( $dir );

        $data = [
            'msg'  => 'DIR: ' . $dir,
            'data' => $all,
        ];

        return view( 'hello.index', $data );
    }

    public function other( Request $request )
    {
        $ext = '.' . $request->file->extension(); // 拡張子を取得
        Storage::disk( 'public' )->putFileAs( 'files', $request->file, 'upload' . $ext );
        return redirect()->route( 'hello' );
    }
}
