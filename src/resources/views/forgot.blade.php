<x-layout::auth>
    <x-slot name="header">
        {{trans('auth::messages.forgot')}}
    </x-slot>
    <x-form::open action="{{route('new_password')}}" method="post"/>
        <div class="form-floating">
          <input name="email" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">{{trans('auth::messages.email')}}</label>
        </div>
    
        <button class="mt-2 w-100 btn btn-lg btn-primary" type="submit">{{trans('auth::messages.reset')}}</button>
        
      <x-form::close/>
<div class="text-end mt-2">
  <a href="{{route('register')}}" class="text-dark text-decoration-none">{{trans('auth::messages.register')}}</a><br/>
  <a href="{{route('login')}}" class="text-dark text-decoration-none">{{trans('auth::messages.login')}}</a>
</div>
</x-layout>