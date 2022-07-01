<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.terms_title')}} 
    </x-slot>
    <x-layout::create_button name="terms"/>
    <h2><strong>Datum:</strong> {{(isset($term->date) ? term->date->format('d-m-Y') : '')}}</h2></br>
    {!! @$term->terms !!}
    
</x-layout::app>