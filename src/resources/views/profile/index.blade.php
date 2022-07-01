<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.profile')}} 
    </x-slot>
    <x-form::open action="{{route('profileSave')}}" method="post"/>
        <x-form::input type="text" name="name" label="{{trans('auth::messages.name')}}" value="{{$user->name}}"/>
        <x-form::input type="email" name="email" label="{{trans('auth::messages.email')}}" value="{{$user->email}}"/>
        <x-form::input type="text" name="username" label="{{trans('auth::messages.username')}}" value="{{$user->username}}"/>    
    <x-form::close class="float-end"/>
    <hr></hr>
    <x-form::open action="{{route('password')}}" method="post"/>
        <x-form::input type="password" name="password" label="{{trans('auth::messages.password')}}"/>
        <x-form::input type="password" name="confirm_password" label="{{trans('auth::messages.password_confirmation')}}"/>
    <x-form::close class="float-end"/>
</x-layout::app>