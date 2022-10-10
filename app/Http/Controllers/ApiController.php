<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiController extends BaseController
{
    use Helpers;

    public function errorResponse($code = 0, $message = null, $statusCode = 200){
        throw  new HttpException($statusCode, $message, null, [], $code);
    }

    public function successResponse($code = 0, $message = null, $statusCode = 200){
        $array = [
            'code' => $code,
            'message' => $message,
            'statusCode' => $statusCode
        ];
        return $this->response->array($array);
    }
}
