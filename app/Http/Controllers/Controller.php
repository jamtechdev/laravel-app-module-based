<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    public function successResponse($message = '', $data = array(), $paginate = null)
    {
        $response = array();
        $response['status'] = true;
        $response['message'] = $message;
        $response['error_type'] = '';
        $response['data'] = $data;
        if (!empty($paginate)) {
            $response['total'] = $paginate->total();
            $response['totalPage'] = $paginate->lastPage();
            $response['currentPage'] = $paginate->currentPage();
            $response['perPage'] = $paginate->perPage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    public function errorResponse($message = '', $type = 'ERROR', $statusCode, $data = array())
    {
        $response = array();
        $response['status'] = false;
        $response['message'] = $message;
        $response['error_type'] = $type;
        $response['data'] = $data;
        return response()->json($response, $statusCode);
    }
}
