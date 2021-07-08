<?php
namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser {
    /**
     * Build a success response
     * @param string|array $data
     * @param int $code
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function successResponse($data, int $code = Response::HTTP_OK){
        return response($data, $code)->header('Content-type', 'application/json');
    }

    /**
     * return Json Response
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code){
        return response()->json([['error' => $message , 'code' => $code] , $code]);
    }

    /**
     * Build a error response
     * @param $message
     * @param $code
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function errorMessage($message, $code){
        return response($message, $code)->header('Content-type', 'application/json');
    }
}
