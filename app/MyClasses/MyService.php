<?php
namespace App\MyClasses;

class MyService
{
    private $serial;
    public  $id     = -1;
    private $msg    = 'Hello! This is MyService';
    private $data   = [ 'Hello', 'Welcome', 'Bye' ];

    public function __construct( int $id )
    {
        $this->serial = rand();
        $this->id     = $id;
        echo '[ ' . $this->serial . ' ]';
    }

    public function setId( int $id )
    {
        if ( $id >= 0 && $id < count( $this->data ) ) {
            $this->id  = $id;
            $this->msg = 'select: ' . $this->data[ $id ];
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data( int $id )
    {
        return $this->data[ $id ];
    }

    public function allData()
    {
        return $this->data;
    }
}
