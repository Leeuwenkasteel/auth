<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Leeuwenkasteel\Auth\Models\Role;
use Leeuwenkasteel\Auth\Models\Permissions;
use DB;
class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
		$user = new User();
		$user->name = 'admin';
		$user->username = 'admin';
		$user->email = 'admin@admin.nl';
		if(config('auth.email_validation') == true){
			$user->email_verified_at = date('Y-m-d H:i:s');
		}
		$user->password = Hash::make('admin');
		$user->save();

		$admin = new Role();
		$admin->name = 'Admin';
		$admin->slug = 'admin';
		$admin->save();
		
		$role = new Role();
		$role->name = 'User';
		$role->slug = 'user';
		$role->save();
		
		$addAdmin = DB::table('users_roles')->insert(['user_id' => $user->id, 'role_id' => $admin->id]);
		

			$userIndex = new Permissions();
			$userIndex->name = 'Users Index';
			$userIndex->slug = 'users.index';
			$userIndex->save();
			
			$userCreate = new Permissions();
			$userCreate->name = 'Users Create';
			$userCreate->slug = 'users.create';
			$userCreate->save();
			
			$userShow = new Permissions();
			$userShow->name = 'Users Show';
			$userShow->slug = 'users.show';
			$userShow->save();
			
			$userEdit = new Permissions();
			$userEdit->name = 'Users Edit';
			$userEdit->slug = 'users.edit';
			$userEdit->save();
			
			$userDelete = new Permissions();
			$userDelete->name = 'Users Delete';
			$userDelete->slug = 'users.delete';
			$userDelete->save();
			
			$roleIndex = new Permissions();
			$roleIndex->name = 'Roles Index';
			$roleIndex->slug = 'roles.index';
			$roleIndex->save();
			
			$roleCreate = new Permissions();
			$roleCreate->name = 'Roles Create';
			$roleCreate->slug = 'roles.create';
			$roleCreate->save();
			
			$roleShow = new Permissions();
			$roleShow->name = 'Roles Show';
			$roleShow->slug = 'roles.show';
			$roleShow->save();
			
			$roleEdit = new Permissions();
			$roleEdit->name = 'Roles Edit';
			$roleEdit->slug = 'roles.edit';
			$roleEdit->save();
			
			$roleDelete = new Permissions();
			$roleDelete->name = 'Roles Delete';
			$roleDelete->slug = 'roles.delete';
			$roleDelete->save();
			
			$permIndex = new Permissions();
			$permIndex->name = 'Permissions Index';
			$permIndex->slug = 'permissions.index';
			$permIndex->save();
			
			$permCreate = new Permissions();
			$permCreate->name = 'Permissions Create';
			$permCreate->slug = 'permissions.create';
			$permCreate->save();
			
			$permShow = new Permissions();
			$permShow->name = 'Permissions Show';
			$permShow->slug = 'permissions.show';
			$permShow->save();
			
			$permEdit = new Permissions();
			$permEdit->name = 'Permissions Edit';
			$permEdit->slug = 'permissions.edit';
			$permEdit->save();
			
			$permDelete = new Permissions();
			$permDelete->name = 'Permissions Delete';
			$permDelete->slug = 'permissions.delete';
			$permDelete->save();

			$termsIndex = new Permissions();
			$termsIndex->name = 'Terms Index';
			$termsIndex->slug = 'terms.index';
			$termsIndex->save();
			
			$termsCreate = new Permissions();
			$termsCreate->name = 'Terms Create';
			$termsCreate->slug = 'terms.create';
			$termsCreate->save();
			
			$termsShow = new Permissions();
			$termsShow->name = 'Terms Show';
			$termsShow->slug = 'terms.show';
			$termsShow->save();
			
			$termsEdit = new Permissions();
			$termsEdit->name = 'Terms Edit';
			$termsEdit->slug = 'terms.edit';
			$termsEdit->save();
			
			$termsDelete = new Permissions();
			$termsDelete->name = 'Terms Delete';
			$termsDelete->slug = 'terms.delete';
			$termsDelete->save();

			$setIndex = new Permissions();
			$setIndex->name = 'Settings Index';
			$setIndex->slug = 'settings.index';
			$setIndex->save();
			
			$setCreate = new Permissions();
			$setCreate->name = 'Settings Create';
			$setCreate->slug = 'settings.create';
			$setCreate->save();

			$setPerm = new Permissions();
			$setPerm->name = 'Settings';
			$setPerm->slug = 'settings';
			$setPerm->save();
			

			
			DB::table('roles_permissions')->insert(['permissions_id' => $userIndex->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $userCreate->id, 'role_id' => $admin->id]);
			// DB::table('roles_permissions')->insert(['permissions_id' => $userShow->id, 'role_id' => $admin->id]);
			// DB::table('roles_permissions')->insert(['permissions_id' => $userEdit->id, 'role_id' => $admin->id]);
			// DB::table('roles_permissions')->insert(['permissions_id' => $userDelete->id, 'role_id' => $admin->id]);
			
			DB::table('roles_permissions')->insert(['permissions_id' => $roleIndex->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $roleCreate->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $roleShow->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $roleEdit->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $roleDelete->id, 'role_id' => $admin->id]);
			
			DB::table('roles_permissions')->insert(['permissions_id' => $permIndex->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $permCreate->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $permShow->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $permEdit->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $permDelete->id, 'role_id' => $admin->id]);
			
			DB::table('roles_permissions')->insert(['permissions_id' => $termsIndex->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $termsCreate->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $termsShow->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $termsEdit->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $termsDelete->id, 'role_id' => $admin->id]);

			DB::table('roles_permissions')->insert(['permissions_id' => $setIndex->id, 'role_id' => $admin->id]);
			DB::table('roles_permissions')->insert(['permissions_id' => $setCreate->id, 'role_id' => $admin->id]);

			DB::table('roles_permissions')->insert(['permissions_id' => $setPerm->id, 'role_id' => $admin->id]);
	}
	
}