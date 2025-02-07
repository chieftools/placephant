<?php

declare(strict_types=1);

namespace App\Http;

use App\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;

final class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        //        \App\Http\Middleware\TrustProxies::class,
        //        \Illuminate\Http\Middleware\HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        //        \App\Http\Middleware\TrimStrings::class,
        //        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            //            \App\Http\Middleware\EncryptCookies::class,
            //            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            //            \Illuminate\Session\Middleware\StartSession::class,
            //            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            //            \App\Http\Middleware\VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        //        'auth' => \App\Http\Middleware\Authenticate::class,
        //        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        //        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => SetCacheHeaders::class,
        //        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        //        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        //        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        //        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
        //        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
