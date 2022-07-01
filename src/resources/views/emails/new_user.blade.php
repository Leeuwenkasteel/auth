@component('mail::message')
# {{ $maildata['title'] }}
{!!$maildata['body']!!}<br/><br/>
{{trans('auth::messages.username')}}: {{$maildata['username']}}<br/>
{{trans('auth::messages.password')}}: {{$maildata['password']}}<br/><br/>
{!!$maildata['footer']!!}<br/>
@component('mail::button', ['url' => $maildata['url']])
{{trans('auth::messages.login')}}
@endcomponent
{{trans('auth::messages.thanks')}},<br>
{{ config('app.name') }}
@endcomponent