<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.role')}} {{$item->name}} {{trans('auth::messages.edit')}}
    </x-slot>
    <x-layout::index_button name="roles"/>
    <x-form::open action="{{route('roles.update', $item->slug)}}" method="post"/>
        @method('PUT')
        <x-form::input type="text" name="name" label="{{trans('auth::messages.name')}}" value="{{$item->name}}"/>
        <x-form::checkboxes name="perm" label="{{trans('auth::messages.permissions')}}" :options="$permissions" :checked="$checked"/>
    <x-form::close/>
</x-layout::app>