<?php
namespace Leeuwenkasteel\Auth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Leeuwenkasteel\Auth\Console\Auth;
use Leeuwenkasteel\Auth\Console\AuthMenu;
use Leeuwenkasteel\Auth\Console\Permission;
use Leeuwenkasteel\Auth\Models\Role;
use Leeuwenkasteel\Auth\Models\Permissions;
use Leeuwenkasteel\Auth\Http\Middleware\RoleMiddleware;
use Leeuwenkasteel\Auth\Http\Middleware\PermissionMiddleware;


class AuthServiceProvider extends ServiceProvider
{
    public function boot(){
		Schema::defaultStringLength(255);
		
    	$this->loadRoutesFrom(__DIR__.'/routes/web.php');
    	$this->loadViewsFrom(__DIR__.'/resources/views', 'auth');
    	$this->loadTranslationsFrom(__DIR__.'/resources/lang', 'auth');
		
		  $this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'auth_migrations');
      $this->publishes([__DIR__.'/database/seeders' => database_path('seeders')], 'auth_seeders');
        
        if ($this->app->runningInConsole()) {
          $this->publishes([
            __DIR__.'/config/config.php' => config_path('leeuwenkasteel-auth.php'),
          ], 'auth_config');
            $this->commands([
              Auth::class,
              AuthMenu::class,
              Permission::class,
            ]);
        }
        $router = $this->app->make(Router::class);
		    $router->aliasMiddleware('role', RoleMiddleware::class);
        $router->aliasMiddleware('permission', PermissionMiddleware::class);

        try {
          Permissions::get()->map(function ($permission) {
              Gate::define($permission->slug, function ($user) use ($permission) {
                  return $user->hasPermissionTo($permission);
              });
          });
      } catch (\Exception $e) {
          report($e);
          return false;
      }

      //Blade directives
      Blade::directive('role', function ($role) {
           return "if(auth()->check() && auth()->user()->hasRole({$role})) :"; //return this if statement inside php tag
      });

      Blade::directive('endrole', function ($role) {
           return "endif;"; //return this endif statement inside php tag
      });

          
    }

    public function register(){
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'auth');
    }
}