<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.permissions')}} {{trans('auth::messages.create')}}
    </x-slot>
    <x-layout::index_button name="permissions"/>
    <x-form::open action="{{route('permissions.update', $item->id)}}" method="post"/>
        @method('PUT')
        <x-form::input type="text" name="name" label="{{trans('auth::messages.name')}}" value="{{$item->name}}"/>
        <x-form::input type="text" name="slug" label="{{trans('auth::messages.slug')}}" value="{{$item->slug}}"/>
    <x-form::close/>
</x-layout::app>