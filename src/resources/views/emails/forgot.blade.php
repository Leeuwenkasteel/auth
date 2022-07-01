@component('mail::message')
# {{ $maildata['title'] }}
{{trans('auth::messages.password_reset_1')}}<br/>{{trans('auth::messages.password_reset_2')}}
@component('mail::button', ['url' => $maildata['url']])
{{trans('auth::messages.reset')}}
@endcomponent
{{trans('auth::messages.thanks')}},<br>
{{ config('app.name') }}
@endcomponent