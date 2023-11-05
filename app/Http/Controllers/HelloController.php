<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    public function index( int $id ) : object
    {
        $myService = app()->makeWith( 'App\MyClasses\MyService', [ 'id' => $id ] );

        $data = [
            'msg'  => $myService->say(),
            'data' => $myService->allData(),
        ];

        return view( 'hello.index', $data );
    }
}
