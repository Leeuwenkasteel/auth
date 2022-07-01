<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Leeuwenkasteel\Auth\Models\Role;
use Leeuwenkasteel\Auth\Models\Permissions;
use Illuminate\Support\Str;
use DB;


class PermissionsController extends Controller
{  
    public function __construct(){
        $this->middleware('permission:permissions.index',   ['only' => ['index']]);
        $this->middleware('permission:permissions.create',   ['only' => ['create', 'store']]);
        $this->middleware('permission:permissions.show',   ['only' => ['show']]);
        $this->middleware('permission:permissions.edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:permissions.destroy',   ['only' => ['destroy']]);
    }

    public function index(){
        $items = Permissions::all();
        return view('auth::permissions.index', compact('items'));
    }

    public function create(){
        $permissions = Permissions::get()->pluck('name', 'id');
        return view('auth::permissions.create', compact('permissions'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required|unique:permissions',
            'slug' => 'required|unique:permissions',
        ]);

        $perm = new Permissions($req->all());
        $perm->name = Str::ucfirst($req->name);
        $perm->save();


        return redirect()->route('permissions.index')->with('success',trans('auth::messages.perm_saved'));
    }
    public function show($id){
        $item = Permissions::find($id);

        return view('auth::permissions.show', compact('item'));
    }

    public function edit($id){
        $item = Permissions::find($id);
        
        return view('auth::permissions.edit', compact('item'));
    }

    public function update(Request $req, $id){        
        $perm = Permissions::findOrFail($id);
        $perm->name = Str::ucfirst($req->name);
        $perm->save();

        return redirect()->route('permissions.index')->with('success',trans('auth::messages.perm_updated'));
    }

}