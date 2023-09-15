<?php

namespace App\Traits;

trait HttpResponses
{
    protected function succes($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Request Was Succesful',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error($data, $message = null)
    {
        return response()->json([
            'status' => 'Error Was Occurred...',
            'message' => $message,
            'data' => $data
        ], 401);
    }
}
