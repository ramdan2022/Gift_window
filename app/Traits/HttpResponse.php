<?php

namespace App\Traits;

use ErrorException;

use InvalidArgumentException;


trait HttpResponse{
    
     private $codes = [
        100 => [false, 'Continue'],
        101 => [false, 'Switching Protocols'],
        200 => [true, 'OK'],
        201 => [true, 'Created'],
        202 => [true, 'Accepted'],
        203 => [false, 'Non-Authoritative Information'],
        204 => [true, 'No Content'],
        205 => [true, 'Reset Content'],
        206 => [true, 'Partial Content'],
        300 => [true, 'Multiple Choices'],
        301 => [true, 'Moved Permanently'],
        302 => [true, 'Moved Temporarily'],
        303 => [true, 'See Other'],
        304 => [true, 'Not Modified'],
        305 => [true, 'Use Proxy'],
        400 => [false, 'Bad Request'],
        401 => [false, 'Unauthorized'],
        402 => [false, 'Payment Required'],
        403 => [false, 'Forbidden'],
        404 => [false, 'Not Found'],
        405 => [false, 'Method Not Allowed'],
        406 => [false, 'Not Acceptable'],
        407 => [false, 'Proxy Authentication Required'],
        408 => [false, 'Request Time-out'],
        409 => [false, 'Conflict'],
        410 => [false, 'Gone'],
        411 => [false, 'Length Required'],
        412 => [false, 'Precondition Failed'],
        413 => [false, 'Request Entity Too Large'],
        414 => [false, 'Request-URI Too Large'],
        415 => [false, 'Unsupported Media Type'],
        500 => [false, 'Internal Server Error'],
        501 => [false, 'Not Implemented'],
        502 => [false, 'Bad Gateway'],
        503 => [false, 'Service Unavailable'],
        504 => [false, 'Gateway Time-out'],
        505 => [false, 'HTTP Version not supported'],
        0 => [false, 'Unknown http status code'],
    ];

    protected function Http_json_response($code,$message='',$data=[]){

        $code = !in_array($code,array_keys($this->codes))? 0 : $code;

        try {

            return response()->json([

                'success' => $this->codes[$code][0],
                'response' => $this->codes[$code][1],
                'message' =>$message,
                'data' =>$data
            ],$code);

        }catch(InvalidArgumentException $e){

            return response()->json([
                'InvalidArgmentException' => $e->getmessage()
            ]);

        }catch(ErrorException $e){

            return response()->json([
                'ErrorException' => $e-> getmessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'Exception' => $e->getmessage()
            ]);
        }
            
        
        

    }
}


