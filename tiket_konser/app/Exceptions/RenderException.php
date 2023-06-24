<?php
 
namespace App\Exceptions;
 
use Exception;
 
class RenderException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }
 
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //  if ($exception instanceof CustomException) {
        //     return response()->view('errors.custom', [], 500);
        // }
    
        // return parent::render($request, $exception);
        // return response($content = $exception, $status = $exception)
        print("rusak");
        print $exception;
    }
}