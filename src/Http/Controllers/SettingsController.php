<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DB;


class SettingsController extends Controller
{  
    public function __construct(){
        $this->middleware('permission:settings.index',   ['only' => ['index']]);
        $this->middleware('permission:settings.create',   ['only' => ['create', 'store']]);
    }

    public function index(){
        return view('auth::settings.index');
    }

    public function auth(Request $req){
        $env = file_get_contents(base_path('.env'));

        if($req->app_name != env('APP_NAME')){
            $env = str_replace("APP_NAME=".env('APP_NAME'), "APP_NAME=".$req->app_name, $env);
        }
        if($req->app_env != env('APP_ENV')){
            $env = str_replace("APP_ENV=".env('APP_ENV'), "APP_ENV=".$req->app_env, $env);
        }
        if($req->app_url != env('APP_URL')){
            $env = str_replace("APP_URL=".env('APP_URL'), "APP_URL=".$req->app_url, $env);
        }
        if(isset($req->app_debug)){
            $env = str_replace("APP_DEBUG=false", "APP_DEBUG=true", $env);
        }else{
            $env = str_replace("APP_DEBUG=true", "APP_DEBUG=false", $env);
        }
        file_put_contents(base_path('.env'), $env);
        return redirect()->back()->with('success',trans('auth::messages.settings_saved'));
    }

    public function database(Request $req){
        $env = file_get_contents(base_path('.env'));

        if($req->db_connection != env('DB_CONNECTION')){
            $env = str_replace("DB_CONNECTION=".env('DB_CONNECTION'), "DB_CONNECTION=".$req->db_connection, $env);
        }
        
        if($req->db_host != env('DB_HOST')){
            $env = str_replace("DB_HOST=".env('DB_HOST'), "DB_HOST=".$req->db_host, $env);
        }
        
        if($req->db_port != env('DB_PORT')){
            $env = str_replace("DB_PORT=".env('DB_PORT'), "DB_PORT=".$req->db_port, $env);
        }
        
        if($req->db_database != env('DB_DATABASE')){
            $env = str_replace("DB_DATABASE=".env('DB_DATABASE'), "DB_DATABASE=".$req->db_database, $env);
        }
        
        if($req->db_username != env('DB_USERNAME')){
            $env = str_replace("DB_USERNAME=".env('DB_USERNAME'), "DB_USERNAME=".$req->db_username, $env);
        }
        
        if($req->db_password != env('DB_PASSWORD')){
            $env = str_replace("DB_PASSWORD=".env('DB_PASSWORD'), "DB_PASSWORD=".$req->db_password, $env);
        }
        file_put_contents(base_path('.env'), $env);
        return redirect()->back()->with('success',trans('auth::messages.settings_saved'));
    }

    public function mail(Request $req){
        $env = file_get_contents(base_path('.env'));

        if($req->mail_mailer != env('MAIL_MAILER')){
            $env = str_replace("MAIL_MAILER=".env('MAIL_MAILER'), "MAIL_MAILER=".$req->mail_mailer, $env);
        }
        if($req->mail_host != env('MAIL_HOST')){
            $env = str_replace("MAIL_HOST=".env('MAIL_HOST'), "MAIL_HOST=".$req->mail_host, $env);
        }
        if($req->mail_port != env('MAIL_PORT')){
            $env = str_replace("MAIL_PORT=".env('MAIL_PORT'), "MAIL_PORT=".$req->mail_port, $env);
        }
        if($req->mail_username != env('MAIL_USERNAME')){
            $env = str_replace("MAIL_USERNAME=".env('MAIL_USERNAME'), "MAIL_USERNAME=".$req->mail_username, $env);
        }
        if($req->mail_password != env('MAIL_PASSWORD')){
            $env = str_replace("MAIL_PASSWORD=".env('MAIL_PASSWORD'), "MAIL_PASSWORD=".$req->mail_password, $env);
        }
        if($req->mail_encryption != env('MAIL_ENCRYPTION')){
            $env = str_replace("MAIL_ENCRYPTION=".env('MAIL_ENCRYPTION'), "MAIL_ENCRYPTION=".$req->mail_encryption, $env);
        }
        if($req->mail_from_name != env('MAIL_FROM_NAME')){
            $env = str_replace("MAIL_FROM_NAME=".env('MAIL_FROM_NAME'), "MAIL_FROM_NAME=".$req->mail_from_name, $env);
        }
        file_put_contents(base_path('.env'), $env);
        return redirect()->back()->with('success',trans('auth::messages.settings_saved'));
    }

    public function menu(Request $req){
        $env = file_get_contents(base_path('.env'));

        if(isset($req->auth_menu)){
            $env = str_replace("AUTH_MENU=false", "AUTH_MENU=true", $env);
        }else{
            $env = str_replace("AUTH_MENU=true", "AUTH_MENU=false", $env);
        }

        if(isset($req->layout_menu)){
            $env = str_replace("LAYOUT_MENU=false", "LAYOUT_MENU=true", $env);
        }else{
            $env = str_replace("LAYOUT_MENU=true", "LAYOUT_MENU=false", $env);
        }

        if(isset($req->media_menu)){
            $env = str_replace("MEDIA_MENU=false", "MEDIA_MENU=true", $env);
        }else{
            $env = str_replace("MEDIA_MENU=true", "MEDIA_MENU=false", $env);
        }

        if(isset($req->icon_menu)){
            $env = str_replace("ICON_MENU=false", "ICON_MENU=true", $env);
        }else{
            $env = str_replace("ICON_MENU=true", "ICON_MENU=false", $env);
        }

        if(isset($req->menu_dev)){
            $env = str_replace("MENU_DEV=false", "MENU_DEV=true", $env);
        }else{
            $env = str_replace("MENU_DEV=true", "MENU_DEV=false", $env);
        }

        file_put_contents(base_path('.env'), $env);
        return redirect()->back()->with('success',trans('auth::messages.settings_saved'));
    }

    public function firebase(Request $req){
        $env = file_get_contents(base_path('.env'));

        if($req->pwa_apikey != env('PWA_APIKEY')){
            $env = str_replace("PWA_APIKEY=".env('PWA_APIKEY'), "PWA_APIKEY=".$req->pwa_apikey, $env);
        }
        if($req->pwa_authdomain != env('PWA_AUTHDOMAIN')){
            $env = str_replace("PWA_AUTHDOMAIN=".env('PWA_AUTHDOMAIN'), "PWA_AUTHDOMAIN=".$req->pwa_authdomain, $env);
        }
        if($req->pwa_databaseurl != env('PWA_DATABASEURL')){
            $env = str_replace("PWA_DATABASEURL=".env('PWA_DATABASEURL'), "PWA_DATABASEURL=".$req->pwa_databaseurl, $env);
        }
        if($req->pwa_projectid != env('PWA_PROJECTID')){
            $env = str_replace("PWA_PROJECTID=".env('PWA_PROJECTID'), "PWA_PROJECTID=".$req->pwa_projectid, $env);
        }
        if($req->pwa_storagebucket != env('PWA_STORAGEBUCKET')){
            $env = str_replace("PWA_STORAGEBUCKET=".env('PWA_STORAGEBUCKET'), "PWA_STORAGEBUCKET=".$req->pwa_storagebucket, $env);
        }
        if($req->pwa_messaingsenderid != env('PWA_MESSAGINGSENDERID')){
            $env = str_replace("PWA_MESSAGINGSENDERID=".env('PWA_MESSAGINGSENDERID'), "PWA_MESSAGINGSENDERID=".$req->pwa_messaingsenderid, $env);
        }
        if($req->pwa_appid != env('PWA_APPID')){
            $env = str_replace("PWA_APPID=".env('PWA_APPID'), "PWA_APPID=".$req->pwa_appid, $env);
        }
        if($req->pwa_measurmentid != env('PWA_MEASUREMENTID')){
            $env = str_replace("PWA_MEASUREMENTID=".env('PWA_MEASUREMENTID'), "PWA_MEASUREMENTID=".$req->pwa_measurmentid, $env);
        }
        file_put_contents(base_path('.env'), $env);
        return redirect()->back()->with('success',trans('auth::messages.settings_saved'));
    }


}