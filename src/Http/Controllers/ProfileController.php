<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Leeuwenkasteel\Auth\Models\Role;
use Auth;
use DB;
use Crypt;

class ProfileController extends Controller
{  
    public function index(){
        $user = Auth::user();
        return view('auth::profile.index', compact('user'));
    }

    public function store(Request $req){
        $user = Auth::user();
        $username = Str::replace(' ', '', $req->username);
        $update = User::findOrFail($user->id);
        if($user->email != $req->email){
            $find = User::whereEmail($req->email)->get()->count();
            if($find != 0){
                return redirect()->back()->with('error',trans('auth::messages.email_exist') )->withInput(['email' => $user->email, 'username' => $req->username, 'name' => $req->name]);
            }
        }
        
        if($user->username != $username){
            $find = User::whereUsername($username)->get()->count();
            if($find != 0){
                return redirect()->back()->with('error',trans('auth::messages.username_exist') )->withInput(['email' => $user->email, 'username' => $req->username, 'name' => $req->name]);
            }
        }
        $update->username = $username;
        $update->email = $req->email;
        $update->name = $req->name;
        $update->update();

        return redirect()->route('profile')->with('success',trans('auth::messages.profile_changed'));

    }

    public function password(Request $req){
        if($req->password == null || $req->confirm_password == null){
            return redirect()->back()->with('error',trans('auth::messages.password_empty') );
        }

        if($req->password != $req->confirm_password){
            return redirect()->back()->with('error',trans('auth::messages.password_not_same') );
        }
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect()->route('profile')->with('success',trans('auth::messages.password_changed'));
    }
}