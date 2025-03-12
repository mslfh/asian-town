<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected function sendResponse($result, $message): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ], 200);
    }

    protected function sendError($error, $errorMessages = [], $code = 404): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $error,
            'data'    => $errorMessages,
        ], $code);
    }
}
