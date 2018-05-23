<?php
namespace App/Exceptions;
use Exception;

class CustomFieldValidation extends Exception
{
    public $validator;

    public function __construct($validator,$message= NULL, $code = NULL, Exception $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
        $this->validator = $validator;
    }

}

public function render($request, Exception $exception)
{

    if($exception instanceof CustomFieldValidation) {
        foreach($exception->validator->errors()->all() as $message) {
            $errors[] = [
                'message' => $message,
            ];
        }

        return response()->json($errors, 400, ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    return parent::render($request, $exception);
}

?>