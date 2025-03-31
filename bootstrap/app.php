<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\CustomerAuthMiddleware;
use App\Http\Middleware\CustomerGuestMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
			'AuthMiddleware' => AuthMiddleware::class,
			'GuestMiddleware' => GuestMiddleware::class,
			'CustomerAuthMiddleware' => CustomerAuthMiddleware::class,
			'CustomerGuestMiddleware' => CustomerGuestMiddleware::class
		]);
		//$middleware->append(CustomerAuthMiddleware::class);
		//$middleware->append(CustomerGuestMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
