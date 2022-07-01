<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Leeuwenkasteel\Menu\Models\MenuFolder as Folder;
use Leeuwenkasteel\Menu\Models\Menu;
use Leeuwenkasteel\Menu\Models\MenuSettings as Set;
class AuthMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $folder = new Folder();
        $folder->title = 'Settings';
        $folder->save();

        $role = new Menu();
        $role->title = 'Roles';
        $role->icon = '1003';
        $role->save();

        $roleSet = new Set();
        $roleSet->menu_id = $role->id;
        $roleSet->package = 1;
        $roleSet->folder_id = $folder->id;
        $roleSet->active = 1;
        $roleSet->save();

        $perm = new Menu();
        $perm->title = 'Permissions';
        $perm->icon = '1245';
        $perm->save();

        $permSet = new Set();
        $permSet->menu_id = $perm->id;
        $permSet->package = 1;
        $permSet->folder_id = $folder->id;
        $permSet->active = 1;
        $permSet->save();

        $user = new Menu();
        $user->title = 'Users';
        $user->icon = '1002';
        $user->save();

        $userSet = new Set();
        $userSet->menu_id = $user->id;
        $userSet->package = 1;
        $userSet->folder_id = $folder->id;
        $userSet->active = 1;
        $userSet->save();

        $terms = new Menu();
        $terms->title = 'Terms';
        $terms->icon = '623';
        $terms->save();

        $termsSet = new Set();
        $termsSet->menu_id = $terms->id;
        $termsSet->package = 1;
        $termsSet->folder_id = $folder->id;
        $termsSet->active = 1;
        $termsSet->save();

        $settings = new Menu();
        $settings->title = 'Settings';
        $settings->icon = '760';
        $settings->save();

        $setSet = new Set();
        $setSet->menu_id = $settings->id;
        $setSet->package = 1;
        $setSet->folder_id = $folder->id;
        $setSet->active = 1;
        $setSet->save();

    }
}