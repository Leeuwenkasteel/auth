<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.users')}} {{trans('auth::messages.create')}}
    </x-slot>
    <x-layout::index_button name="users"/>
    <x-form::open action="{{route('users.store')}}" method="post"/>
        <x-form::input type="text" name="name" label="{{trans('auth::messages.name')}}"/>
        <x-form::input type="email" name="email" label="{{trans('auth::messages.email')}}"/>
        <x-form::select :options="$roles" label="{{trans('auth::messages.role')}}" name="role" id="role"/>    
    <x-form::close/>
</x-layout::app>