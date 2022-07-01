<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Leeuwenkasteel\Auth\Models\Role;
use Leeuwenkasteel\Auth\Mail\VerifyMail;
use Leeuwenkasteel\Auth\Mail\ForgotMail;
use Auth;
use Mail;
use DB;
use Crypt;

class AuthController extends Controller
{  
    public function register(Request $req){
        $validated = $req->validate([
			'name' => 'required',
			'username' => 'required|unique:users',
			'email' => 'required|unique:users',
			'password' => 'required|confirmed|min:8',
			'password_confirmation' => 'required',
			'terms' => 'required'
		]);

		$user = new User($req->all());
		$user->password = Hash::make($req->password);
		$user->save();

		$role = Role::whereName(config('auth.auth_role'))->get()->first();
		$addRole = DB::table('users_roles')->insert(['user_id' => $user->id, 'role_id' => $role->id]);

		if(config('auth.email_validation') == true){
			$email = $req->email;
			$random = Str::random(40);

			$token = User::whereEmail($req->email)->update(['token' => $random]);

			$maildata = [
				'title' => trans('auth::messages.email_verify'),
				'url' => route('verify', $random)
			];
	
			Mail::to($email)->send(new VerifyMail($maildata));
			return redirect()->route('login')->with('success',trans('auth::messages.email_registration_send'))->withInput();
		}

		return redirect()->route('login')->with('success',trans('auth::messages.thank_registration'))->withInput();
    }

	public function verify($token){
		$user = User::whereToken($token)->update(['email_verified_at' => date('Y-m-d H:i:s'), 'token' => NULL]);
		return redirect()->route('login')->with('success',trans('auth::messages.email_verified'));	
	} 

	public function loginSave(Request $req){
		$user = User::whereUsername($req->username)->get()->first();

		if(empty($user)){
			return back()->with('error',trans('auth::messages.no_credentials'))->withInput();
		}

		if(config('auth.email_validation') == true){
			if($user->email_verified_at == null){
				return redirect()->back()->with('error',trans('auth::messages.email_verify') )->with('email_verify', true)->withInput(['email' => $user->email, 'username' => $req->username]);
			}
		}
		$userdata = array(
			'email' => $user->email,
			'password' => $req->password
		);
		
		if (Auth::attempt($userdata)) {
			$req->session()->regenerate();
			
				return redirect()->route('dashboard');
		}
	}

	public function new_token(Request $req){
			$email = $req->email;
			$random = Str::random(40);

			$token = User::whereEmail($req->email)->update(['token' => $random]);

			$maildata = [
				'title' => trans('auth::messages.email_verify'),
				'url' => route('verify', $random)
			];
	
			Mail::to($email)->send(new VerifyMail($maildata));
			return redirect()->route('login')->with('success',trans('auth::messages.email_registration_send'));
	}

	public function new_password(Request $req){
		$user = User::whereEmail($req->email)->get();
		if($user->count() == 1){
			$random = Str::random(40);
			DB::table('password_resets')->insert(['email' => $req->email, 'token' => $random]);

			$email = $req->email;
			$token = User::whereEmail($req->email)->update(['token' => $random]);

			$maildata = [
				'title' => trans('auth::messages.reset_password'),
				'url' => route('reset_password', $random)
			];
	
			Mail::to($email)->send(new ForgotMail($maildata));
			return redirect()->route('login')->with('success',trans('auth::messages.email_reset'));
		}
		return redirect()->route('login');
		
	}

	public function reset_password($token){
		return view('auth::reset_password', compact('token'));
	}

	public function reset_password_save(Request $req){
		$validated = $req->validate([
			'password' => 'required|confirmed|min:8',
			'password_confirmation' => 'required',
			'token' => 'required',
		]);
		$email = DB::table('password_resets')->whereToken($req->token)->get()->first()->email;
		$user = User::whereEmail($email)->get()->first();

		$update = User::find($user->id);
		$update->password = Hash::make($req->password);
		$update->update();


		return redirect()->route('login')->with('success',trans('auth::messages.password_reset_success'));
	}

	public function logout(){
		Auth::logout();
        return redirect()->route('login');
	}



}