<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    public function __construct( MyService $myService )
    {
        $myService = app( 'App\MyClasses\MyService' );
    }

    public function index( MyService $myService, int $id ) : object
    {
        $myService->setId( $id );
        $data = [
            'msg'  => $myService->say(),
            'data' => $myService->allData(),
        ];

        return view( 'hello.index', $data );
    }
}
