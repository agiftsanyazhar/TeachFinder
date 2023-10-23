<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    RateLimiter,
    Route,
    File,
};

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin/users/user';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/api.php'));

            $apiRoutePath = base_path('routes/api');
            $apiRouteFiles = File::files($apiRoutePath);

            foreach ($apiRouteFiles as $routeFile) {
                $filename = $routeFile->getFilename();
                if ($filename !== 'api.php') {
                    Route::middleware('api')
                        ->prefix('api')
                        ->group($apiRoutePath . '/' . $filename);
                }
            }

            Route::prefix('admin')
                ->middleware(['web', 'auth', 'auth.admin'])
                ->namespace($this->namespace)
                ->name('admin.')
                ->group(base_path('routes/admin/admin.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
