<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    public function index( MyService $myService, int $id ) : object
    {
        $myService->setId( $id );
        $data = [
            'msg'  => $myService->say(),
            'data' => $myService->allData(),
        ];

        var_dump( $myService->id );

        return view( 'hello.index', $data );
    }
}
