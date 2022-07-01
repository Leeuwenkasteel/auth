<?php
namespace Leeuwenkasteel\Auth\Console;

use Illuminate\Console\Command;


class Auth extends Command
{
    protected $signature = 'auth:install';

    protected $description = 'Install the AuthPackage';

    public function handle()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'auth_migrations']);
        $this->callSilent('migrate');
        $this->info("Migrated ");

        $this->callSilent('vendor:publish', ['--tag' => 'auth_seeders']);
        $this->callSilent('db:seed', ['--class' => 'AuthSeeder']);
        $this->info("Seeds ");
        $this->callSilent('vendor:publish', ['--tag' => 'auth_config']);

        $this->callSilent('layout:install');
        $this->info("Layout is installed ");

        $this->callSilent('messages:install');
        $this->info("Messages is installed ");

        $userModel = file_get_contents(__DIR__."/../resources/stubs/user.stub");
        file_put_contents(app_path("Models/User.php"), $userModel);
        $this->info("User Model us published ");

        $routes = file_get_contents(__DIR__."/../resources/stubs/web.stub");
        file_put_contents(base_path("routes/web.php"), $routes);

        $this->info("Routes us published ");

        $dash = file_get_contents(__DIR__."/../resources/stubs/dashboard.stub");
        file_put_contents(resource_path("views/dashboard.blade.php"), $dash);

        $this->info("Dashboard us published ");

        

        $this->info("The packages is installed");
        
    }
}