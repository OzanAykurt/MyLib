<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\CheckForMaintenanceMode;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->alias([
            'maintenance' => CheckForMaintenanceMode::class,
            'encrypt' => EncryptCookies::class,
            'trustProxies' => TrustProxies::class,
            'verified' => VerifyCsrfToken::class,
            'bindings' => SubstituteBindings::class,
            'admin' => AdminMiddleware::class,
        ]);
    })
    ->create();
