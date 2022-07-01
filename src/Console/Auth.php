<?php
namespace Leeuwenkasteel\Auth\Console;

use Illuminate\Console\Command;


class Auth extends Command
{
    protected $signature = 'auth:install';

    protected $description = 'Install the AuthPackage';

    public function handle()
    {
        $userModel = file_get_contents(__DIR__."/../resources/stubs/user.stub");
        file_put_contents(app_path("Models/User.php"), $userModel);

        $routes = file_get_contents(__DIR__."/../resources/stubs/web.stub");
        file_put_contents(base_path("routes/web.php"), $routes);

        $dash = file_get_contents(__DIR__."/../resources/stubs/dashboard.stub");
        file_put_contents(resource_path("views/dashboard.blade.php"), $dash);

        $this->callSilent('vendor:publish', ['--tag' => 'auth_migrations']);
        $this->callSilent('migrate');
        $this->callSilent('vendor:publish', ['--tag' => 'auth_seeders']);
        $this->callSilent('db:seed', ['--class' => 'AuthSeeder']);
        $this->callSilent('vendor:publish', ['--tag' => 'auth_config']);

        $this->info("The packages is installed");
        
    }
}