<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.role')}}: {{$item->name}}
    </x-slot>
    <x-layout::index_button name="roles"/>
    <x-layout::edit_button name="roles" slug="{{$item->slug}}"/>
    <x-layout::destroy_button name="roles" slug="{{$item->slug}}"/>
    

    <x-table::open/>
        <x-table::head>
			<x-table::th name='permissions'/>
        </x-table::head>
        <x-table::body>
            @foreach($item->permissions as $perm)
                <x-table::tr>
			        <x-table::td name='{{$perm->name}}'/>
                </x-table::tr>
            @endforeach
        </x-table::body>
    <x-table::close/>

</x-layout::app>