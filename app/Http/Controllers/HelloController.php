<?php

namespace App\Http\Controllers;

use App\Models\Person;
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

    public function index( Request $request, Response $response ) : object
    {
        $msg    = 'please input text:';
        $keys   = [];
        $values = [];

        $onlyKeys = array(
            'name',
            'mail',
        );

        if ( $request->isMethod( 'get' ) ) {
            $form   = $request->only( $onlyKeys );
            $keys   = array_keys( $form );
            $values = array_values( $form );

            $result = '<html><body>';

            foreach ( $form as $key => $value ) {
                $result .= $key . '：' . $value . '<br>';
            }

            $result .= '</body></html>';
            $response->setContent( $result );

            $request->flash();

            var_dump( $request->query() );
        }

        $data = [
            'msg'    => $msg,
            'keys'   => $keys,
            'values' => $values,
        ];

        return view( 'hello.index', $data );
    }
}
