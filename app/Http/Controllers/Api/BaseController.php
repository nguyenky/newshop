<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
class BaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
    }
    public function sendError($error, $code = 404)
    {
        $res = [
            'success' => false,
            'message' => $error,
        ];
        return $res;
    }
}
