<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Leeuwenkasteel\Auth\Models\Role;
use Leeuwenkasteel\Auth\Models\Permissions;
use Illuminate\Support\Str;
use DB;


class RolesController extends Controller
{  
    public function __construct(){
        $this->middleware('permission:roles.index',   ['only' => ['index']]);
        $this->middleware('permission:roles.create',   ['only' => ['create', 'store']]);
        $this->middleware('permission:roles.show',   ['only' => ['show']]);
        $this->middleware('permission:roles.edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:roles.destroy',   ['only' => ['destroy']]);
    }

    public function index(){
        $items = Role::all();
        return view('auth::roles.index', compact('items'));
    }

    public function create(){
        $permissions = Permissions::get()->pluck('name', 'id');
        return view('auth::roles.create', compact('permissions'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = new Role();
        $role->name = Str::ucfirst($req->name);
        $role->save();

        $role->permissions()->sync($req->perm);

        return redirect()->route('roles.index')->with('success',trans('auth::messages.roles_saved'));
    }
    public function show($slug){
        $item = Role::whereSlug($slug)->get()->first();

        return view('auth::roles.show', compact('item'));
    }

    public function edit($slug){
        $item = Role::whereSlug($slug)->get()->first();
        $permissions = Permissions::get()->pluck('name', 'id');
        $checked = DB::table('roles_permissions')->whereRoleId($item->id)->get()->pluck('permissions_id')->toArray();
        return view('auth::roles.edit', compact('item', 'permissions', 'checked'));
    }

    public function update(Request $req, $slug){
        $item = Role::whereSlug($slug)->get()->first();

        if($item->name != $req->name){
            $validated = $req->validate([
                'name' => 'required|unique:roles',
            ]);
        }
        
        $role = Role::findOrFail($item->id);
        $role->name = Str::ucfirst($req->name);
        $role->save();

        $role->permissions()->sync($req->perm);

        return redirect()->route('roles.index')->with('success',trans('auth::messages.roles_updated'));
    }
}