<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): JsonResponse
    {
        return match (true) {
            // TODO тут перехватывать исключения для отдачи в json
            default => $this->getFaultResponse($e, $e->getCode()),
        };
    }

    private function getFaultResponse(Throwable $e, string $code = Response::HTTP_BAD_GATEWAY): JsonResponse
    {
        return (new FaultResponse($e->getMessage()))->response()->setStatusCode($code);
    }
}
