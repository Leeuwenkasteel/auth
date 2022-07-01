@component('mail::message')
# {{ $maildata['title'] }}
{{trans('auth::messages.verify_email', ['appname' => config('app.name')])}}
@component('mail::button', ['url' => $maildata['url']])
{{trans('auth::messages.verify')}}
@endcomponent
{{trans('auth::messages.thanks')}},<br>
{{ config('app.name') }}
@endcomponent