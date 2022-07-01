<x-layout::auth>
    <x-slot name="header">
        {{trans('auth::messages.login')}}
    </x-slot>
    <x-form::open action="{{route('loginSave')}}" method="post"/>
        <div class="form-floating">
          <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">{{trans('auth::messages.username')}}</label>
        </div>
        <div class="form-floating mt-2">
          <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">{{trans('auth::messages.password')}}</label>
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">{{trans('auth::messages.sign_in')}}</button>
        
      </form>
      @if (Session::get('email_verify'))
      <form action="{{route('new_token')}}" method="post">
        @csrf
        <input type="hidden" value="{{old('email')}}" name="email">
        <button type="submit" class="btn btn-outline-danger mt-2 w-100 btn-sm" href="{{route('forgot')}}">{{trans('auth::messages.new_link')}}</button>
      </form>
      @endif
      
<div class="text-end mt-2">
  <a href="{{route('register')}}" class="text-dark text-decoration-none">{{trans('auth::messages.register')}}</a><br/>
  <a href="{{route('forgot')}}" class="text-dark text-decoration-none">{{trans('auth::messages.forgot')}}</a>
</div>
</x-layout>