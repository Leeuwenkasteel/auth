<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.terms_title')}} {{trans('auth::messages.create')}}
    </x-slot>
    <x-layout::index_button name="terms"/>
    <x-form::open action="{{route('terms.store')}}" method="post"/>
        <x-form::input type="date" name="date" label="{{trans('auth::messages.start_date')}}" value="{{$date}}" min="{{$date}}"/>
        <x-form::textarea label="{{trans('auth::messages.terms_title')}}" name="terms"/>
    <x-form::close/>
</x-layout::app>