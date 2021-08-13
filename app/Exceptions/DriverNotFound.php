<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class DriverNotFoundException extends Exception
{
    public static function render($request, Throwable $e)
    {
        return response()->json([
            'data' => null,
            'msg' => [
                'summary' => 'El conductor no se encuentra en la base de datos',
                'detail' => '',
                'code' => '404',
            ]
        ], 404);
    }
}
