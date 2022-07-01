<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.settings')}} 
    </x-slot>
    <x-form::open method="post" action="{{route('settings_auth')}}" label="App Settings"/>
        <x-form::input type="text" name="app_name" label="App Name" value="{{env('APP_NAME')}}"/>
        <x-form::select :options="['local' =>'local', 'dev' => 'dev', 'live' => 'live']" id="app_env" name="app_env" label="App Env" select="{{env('APP_ENV')}}"/>
        <x-form::troggle name="app_debug" label="App Debug" checked="{{env('APP_DEBUG')}}" />
        <x-form::input type="text" name="app_url" label="App Url" value="{{env('APP_URL')}}"/>
    <x-form::close class="float-end"/>
    <hr></hr>
    <x-form::open method="post" action="{{route('settings_database')}}" label="Database Settings"/>
        <x-form::input type="text" name="db_connection" label="Database Connection" value="{{env('DB_CONNECTION')}}"/>
        <x-form::input type="text" name="db_host" label="Database Host" value="{{env('DB_HOST')}}"/>
        <x-form::input type="text" name="db_port" label="Database Port" value="{{env('DB_PORT')}}"/>
        <x-form::input type="text" name="db_database" label="Database Name" value="{{env('DB_DATABASE')}}"/>
        <x-form::input type="text" name="db_username" label="Database Username" value="{{env('DB_USERNAME')}}"/>
        <x-form::input type="password" name="db_password" label="Database Password" value="{{env('DB_PASSWORD')}}"/>
    <x-form::close class="float-end"/>
    <hr></hr>
    <x-form::open method="post" action="{{route('settings_mail')}}" label="Mail Settings"/>
        <x-form::input type="text" name="mail_mailer" label="Mail Mailer" value="{{env('MAIL_MAILER')}}"/>
        <x-form::input type="text" name="mail_host" label="Mail Host" value="{{env('MAIL_HOST')}}"/>
        <x-form::input type="text" name="mail_port" label="Mail Port" value="{{env('MAIL_PORT')}}"/>
        <x-form::input type="text" name="mail_username" label="Mail Username" value="{{env('MAIL_USERNAME')}}"/>
        <x-form::input type="password" name="mail_password" label="Mail Password" value="{{env('MAIL_PASSWORD')}}"/>
        <x-form::input type="text" name="mail_encryption" label="Mail Encryption" value="{{env('MAIL_ENCRYPTION')}}"/>
        <x-form::input type="text" name="mail_from_name" label="Mail From Name" value="{{env('MAIL_FROM_NAME')}}"/>
    <x-form::close class="float-end"/>
</x-layout::app>