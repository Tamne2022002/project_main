<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema; 
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('formatmoney', function ($money) {
            return "<?php echo number_format($money, 0,',','.').'đ'; ?>";
        });

        foreach (config('permissions') as $key => $permissions) {
            foreach ($permissions as $action => $permission) {
                Gate::define("{$key}-{$action}", function (User $user) use ($permission) {
                    return $user->CheckPermissionAccess($permission);
                });
            }
        }

        Schema::defaultStringLength(191);
    }
}
