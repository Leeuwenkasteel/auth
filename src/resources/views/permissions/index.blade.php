<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.permissions')}} 
    </x-slot>
    
    <x-table::open name="permissions"/>
        <x-table::head>
			<x-table::th name='name'/>
			<x-table::th name='slug'/>
            <x-table::th_actions/>
        </x-table::head>
        <x-table::body>
            @foreach($items as $item)
                <x-table::tr>
			        <x-table::td name='{{$item->name}}'/>
			        <x-table::td name='{{$item->slug}}'/>
                    <x-table::actions name="permissions" slug='{{$item->id}}'/>
                </x-table::tr>
            @endforeach
        </x-table::body>
    <x-table::close/>
</x-layout::app>