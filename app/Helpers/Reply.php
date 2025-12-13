<?php

namespace App\Helpers;

class Reply
{
    public static function success($message = 'Success')
    {
        return response()->json([
            'status' => true,
            'message' => $message
        ], 200);
    }

    public static function successWith($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    public static function successWithMessage($view, $compact = '', $message = '')
    {
        return response()->json(
            [
                'status' => true,
                'message' => $message,
                'view' => $view,
                'data' => $compact,
            ],
            200,
        );
    }

    public static function successWithView($view, $compact = '')
    {
        if ($compact) {
            return response()->view($view, $compact);
        }
        return response()->view($view);
    }

    public static function successWithCompactAndView($view, $compact)
    {
        return response()->json(
            [
                'status' => 'true',
                'data' => $compact,
                'view' => $view->render()
            ]
        );
    }

    public static function error($message = 'Error')
    {
        return response()->json(
            [
                'status' => false,
                'message' => $message,
            ],
            500,
        );
    }

    public static function errorWith($message, $data)
    {
        return response()->json(
            [
                'status' => false,
                'message' => $message,
                'error' => $data,
            ],
            500,
        );
    }
}
