<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Whoops\Run;
use  Whoops\Handler\PrettyPageHandler;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
          if($this->isHttpException($e)){

              return $this->renderHttpException($e);

          } else{
              return $this->renderWithWhoops( $e);
          }

//        return parent::render($request, $e);
	}

    protected   function renderWithWhoops(Exception $e){


        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
//          $whoops->pushHandler(new CallbackHandler ) ;
//        $whoops->register();

        return new Response($whoops->handleException($e),$e->getStatusCode(), $e->getHeaders());


    }

}
