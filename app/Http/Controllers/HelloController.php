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
        }

        $data = [
            'msg'    => $msg,
            'keys'   => $keys,
            'values' => $values,
        ];

        return view( 'hello.index', $data );
    }

    /**
     * other
     * 
     * @param
     * @param
     * @return 
     */
    public function other ( Request $request ) : object
    {
        $data = [
            'mame' => 'name',
            'mail' => 'mail@gmail.com',
            'tel'  => '000-0000-0000',
        ];

        $query_str = http_build_query( $data );
        $data[ 'msg' ] = $query_str;

        return redirect()->route( 'hello', [ 'name' => 'Taro' ] );
    }
}
