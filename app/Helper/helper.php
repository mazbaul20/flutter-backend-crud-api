<?php

if (! function_exists('apiResponse')) {

    function apiResponse($status, $message, $data = null, $code = 200)
    {
        $response = [
            'status'  => $status,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
