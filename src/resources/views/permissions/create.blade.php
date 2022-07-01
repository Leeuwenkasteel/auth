<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.permissions')}} {{trans('auth::messages.create')}}
    </x-slot>
    <x-layout::index_button name="permissions"/>
    <x-form::open action="{{route('permissions.store')}}" method="post"/>
        <x-form::input type="text" name="name" label="{{trans('auth::messages.name')}}"/>
        <x-form::input type="text" name="slug" label="{{trans('auth::messages.slug')}}"/>
    <x-form::close/>
</x-layout::app>