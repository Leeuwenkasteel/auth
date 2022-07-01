<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.roles')}} {{trans('auth::messages.create')}}
    </x-slot>
    <x-layout::index_button name="roles"/>
    <x-form::open action="{{route('roles.store')}}" method="post"/>
        <x-form::input type="text" name="name" label="{{trans('auth::messages.name')}}" value="test"/>
        <x-form::checkboxes name="perm" label="{{trans('auth::messages.permissions')}}" :options="$permissions"/>
    <x-form::close/>
</x-layout::app>