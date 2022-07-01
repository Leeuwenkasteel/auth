<?php
namespace Leeuwenkasteel\Auth\Console;

use Illuminate\Console\Command;
use Leeuwenkasteel\Auth\Models\Permissions;
use Leeuwenkasteel\Auth\Models\Role;
use DB;
class Permission extends Command
{
    protected $signature = 'auth:permission {permission}';

    protected $description = 'Permission for AuthPackage';

    public function handle()
    {
        $perm = $this->argument('permission');

        $index = new Permissions();
        $index->name = ucfirst($perm). ' Index';
        $index->slug = $perm.'.index';
        $index->save();

        $create = new Permissions();
        $create->name = ucfirst($perm). ' Create';
        $create->slug = $perm.'.create';
        $create->save();

        $store = new Permissions();
        $store->name = ucfirst($perm). ' Store';
        $store->slug = $perm.'.store';
        $store->save();

        $show = new Permissions();
        $show->name = ucfirst($perm). ' Show';
        $show->slug = $perm.'.show';
        $show->save();

        $edit = new Permissions();
        $edit->name = ucfirst($perm). ' Edit';
        $edit->slug = $perm.'.edit';
        $edit->save();

        $update = new Permissions();
        $update->name = ucfirst($perm). ' Update';
        $update->slug = $perm.'.update';
        $update->save();

        $delete = new Permissions();
        $delete->name = ucfirst($perm). ' Delete';
        $delete->slug = $perm.'.delete';
        $delete->save();

        $role = Role::whereName('admin')->get()->first();

        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $index->id]);
        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $create->id]);
        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $store->id]);
        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $show->id]);
        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $edit->id]);
        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $update->id]);
        DB::table('roles_permissions')->insert(['role_id' => $role->id, 'permissions_id' => $delete->id]);

    }

}