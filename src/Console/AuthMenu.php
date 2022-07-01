<?php
namespace Leeuwenkasteel\Auth\Console;

use Illuminate\Console\Command;


class AuthMenu extends Command
{
    protected $signature = 'auth:menu';

    protected $description = 'Install the menu for AuthPackage';

    public function handle()
    {
        $this->callSilent('auth:install');
        $this->callSilent('db:seed', ['--class' => 'AuthMenuSeeder']);
    }
}