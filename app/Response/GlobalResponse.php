<?php
namespace App\Response;

class GlobalResponse {  

   public static function showResponse($data) {
       $response = [
        'code' => 200,
        'status' => 'success',
        'data' => $data,
        'message' => 'Retrieve data'
        ];
       return response()->json($response, $response['code']); 
  }

   public static function createResponse($message)
   {
        $response = [
        'code' => 201,
        'status' => 'succcess',
        'message' => $message
        ];
        return response()->json($message, $response['code']);
    }

    public static function updateResponse($message)
    {
        $response = [
        'code' => 201,
        'status' => 'succcess',
        'message' => $message
        ];
        return response()->json($response, $response['code']);
    }

    public static function deleteResponse($message)
    {
        $response = [
        'code' => 204,
        'status' => 'success',
        'message' => $message
        ];
        return response()->json($response, $response['code']);
    }

    public static function serverErrorResponse()
    {
        $response = [
        'code' => 501,
        'status' => 'error',
        'data' => [],
        'message' => 'Internal Server Error!, Please contact Administrator!!'
        ];
        return response()->json($response, $response['code']);
    }
     
    public static function notFoundResponse()
    {
        $response = [
        'code' => 404,
        'status' => 'error',
        'data' => 'Resource Not Found',
        'message' => 'Not Found'
        ];
        return response()->json($response, $response['code']);
    }

    public static function clientErrorResponse($data)
    {
        $response = [
        'code' => 422,
        'status' => 'error',
        'data' => $data,
        'message' => 'Unprocessable entity'
        ];
        return response()->json($response, $response['code']);
    }
}

?>

