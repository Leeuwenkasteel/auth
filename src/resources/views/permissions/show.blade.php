<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.role')}}: {{$item->name}}
    </x-slot>
    <x-layout::index_button name="permissions"/>
    <x-layout::edit_button name="permissions" slug="{{$item->id}}"/>
    <x-layout::destroy_button name="permissions" slug="{{$item->id}}"/>
    <div class="clearfix mb-2">
    <div class="mt-2">
        <strong>{{trans('auth::messages.name')}}:</strong> {{$item->name}}<br/>
        <strong>{{trans('auth::messages.slug')}}:</strong> {{$item->slug}}
    </div>
</x-layout::app>