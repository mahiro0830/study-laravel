<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $filename;

    public function __construct()
    {
        $this->filename = 'hello.txt';
    }

    public function index( MyService $myService ) : object
    {
        $data = [
            'msg'  => $myService->say(),
            'data' => $myService->data(),
        ];

        return view( 'hello.index', $data );
    }
}
