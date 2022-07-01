<x-layout::app>
    <x-slot name="header">
    {{trans('auth::messages.users')}} 
    </x-slot>
    
    <x-table::open name="users"/>
        <x-table::head>
			<x-table::th name='name'/>
            <x-table::th name='email'/>
            <x-table::th_actions/>
        </x-table::head>
        <x-table::body>
            @foreach($items as $item)
                <x-table::tr>
			        <x-table::td name='{{$item->name}}'/>
                    <x-table::td name='{{$item->email}}'/>
                    <x-table::actions name="roles" slug='{{$item->slug}}'/>
                </x-table::tr>
            @endforeach
        </x-table::body>
    <x-table::close/>
</x-layout::app>