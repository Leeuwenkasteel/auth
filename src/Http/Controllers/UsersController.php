<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Leeuwenkasteel\Auth\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Leeuwenkasteel\Auth\Mail\NewUserMail;
use DB;
use Mail;

class UsersController extends Controller
{  
    public function __construct(){
        $this->middleware('permission:users.index',   ['only' => ['index']]);
        $this->middleware('permission:users.create',   ['only' => ['create', 'store']]);
        $this->middleware('permission:users.show',   ['only' => ['show']]);
        $this->middleware('permission:users.edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:users.destroy',   ['only' => ['destroy']]);
    }

    public function index(){
        $items = User::all();
        return view('auth::users.index', compact('items'));
    }

    public function create(){
        $roles = Role::pluck('name', 'id')->toArray();
        return view('auth::users.create',  compact('roles'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);
        $username = Str::random(6);
        $password = Str::random(8);
        $token = Str::random(40);

        $new = new User($req->all());
        $new->username = $username;
        $new->password = Hash::make($password);
        $new->token = $token;
        $new->save();

        DB::table('users_roles')->insert(['user_id' => $new->id, 'role_id' => $req->role]);
       
        $maildata = [
            'title' => trans('auth::messages.invited'),
            'url' => route('verify', $token),
            'body' => trans('auth::messages.invited_team_body'),
            'footer' => trans('auth::messages.invited_team_body_1'),
            'username' => $username,
            'password' => $password,
        ];

        Mail::to($req->email)->send(new NewUserMail($maildata));

        return redirect()->route('users.index')->with('success',trans('auth::messages.user_saved'));
    }
}