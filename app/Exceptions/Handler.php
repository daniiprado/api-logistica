<?php

namespace Logistic\Exceptions;

use ErrorException;
use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Logistic\Traits\ApiResponse;
use PDOException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\{ AuthenticationException, Access\AuthorizationException };
use Symfony\Component\HttpKernel\Exception\{ HttpException, NotFoundHttpException, MethodNotAllowedHttpException };

class Handler extends ExceptionHandler
{
    use ApiResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        /**
         * Api Request
         */
        if ( $request->expectsJson() ) {

            if ($exception instanceof ThrottleRequestsException)
                return $this->errorResponse( __('validation.handler.max_attempts'), 429 );

            if ($exception instanceof ValidationException)
                return $this->convertValidationExceptionToResponse( $exception, $request );

            if ($exception instanceof ModelNotFoundException)
                return $this->errorResponse(__('validation.handler.resource_not_found'), 404);

            if ($exception instanceof AuthenticationException)
                return $this->unauthenticated($request, $exception);

            if ($exception instanceof NotFoundHttpException)
                return $this->errorResponse(__('validation.handler.resource_not_found_url'), 404);

            if ($exception instanceof RelationNotFoundException)
                return $this->errorResponse(__('validation.handler.relation_not_found'), 404);

            if ($exception instanceof AuthorizationException)
                return $this->errorResponse(__('validation.handler.unauthorized'), 403);

            if ($exception instanceof MethodNotAllowedHttpException)
                return $this->errorResponse(__('validation.handler.method_allow'), 405);

            if ($exception instanceof HttpException)
                return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());

            if ( $exception instanceof ErrorException )
                return $this->errorResponse(__('validation.handler.unexpected_failure'), 500);

            if ($exception instanceof FatalThrowableError)
                return $this->errorResponse(__('validation.handler.conflict'), 409);

            if ($exception instanceof QueryException) {
                $code = $exception->errorInfo[1];

                if ($exception->errorInfo[0] === "23503")
                    return $this->errorResponse(__('validation.handler.relation_not_delete'), 409);

                if ($code == 1451)
                    return $this->errorResponse(__('validation.handler.relation_not_delete'), 409);

                if ($code == 7)
                    return $this->errorResponse(__('validation.handler.conflict'), 409);

                if ($exception->getCode() == 7)
                    return $this->errorResponse(__('validation.handler.service_unavailable'), 503);
            }

            if ($exception instanceof TokenMismatchException)
                return $this->errorResponse(__('validation.handler.token_mismatch'), 422);
        }

        /**
         * Request Web
         */
        if ($exception instanceof TokenMismatchException)
            return redirect()->back()->withInput($request->input());

        if ($exception instanceof QueryException) {
            if ($exception->getCode() == 7)
                return response()->view('errors.503');
        }

        if ($exception instanceof AuthenticationException)
            return $this->unauthenticated($request, $exception);

        if ($exception instanceof ClientException || $exception instanceof ServerException) {
            $status = $exception->getResponse()->getStatusCode();
            if ( view()->exists("errors.{$status}"))
                return response()->view("errors.{$status}");
        }

        if ($exception instanceof ErrorException) {
            return parent::render($request, $exception);
//            $status = $exception->getPrevious()->getResponse()->getStatusCode();
//            if (view()->exists("errors.{$status}"))
//                return response()->view("errors.{$status}");
        }

        if ($exception instanceof PDOException) {
            if ($exception->getCode() == 7)
                return response()->view('errors.503');
        }

        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();
            if (view()->exists("errors.{$status}"))
                return response()->view("errors.{$status}", ['exception' => $exception], $status, $exception->getHeaders());
        }

        return parent::render($request, $exception);
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        return $request->expectsJson()
            ? $this->errorResponse(
                $e->validator->errors()->getMessages(),
                422
            )
            : $this->invalid($request, $e);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ?   $this->errorResponse(__('validation.handler.unauthenticated'), 401)
            :   redirect()->guest(route('login'));
    }
}
