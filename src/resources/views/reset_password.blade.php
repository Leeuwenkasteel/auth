<x-layout::auth>
    <x-slot name="header">
        {{trans('auth::messages.reset_password')}}
    </x-slot>
    <x-form::open action="{{route('reset_password_save')}}" method="post"/>
    <div class="form-floating mt-2">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">{{trans('auth::messages.password')}}</label>
        </div>
        @error('password')
            <div class="small text-danger mt-0"><small>{{ $message }}</small></div>
        @enderror
        <div class="form-floating mt-2">
          <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" value="{{old('password_confirmation')}}" id="floatingPassword" placeholder="password_confirmation">
          <label for="floatingPassword">{{trans('auth::messages.password_confirmation')}}</label>
        </div>
        <input type="hidden" name="token" value="{{$token}}">
    
        <button class="mt-2 w-100 btn btn-lg btn-primary" type="submit">{{trans('auth::messages.reset')}}</button>
        
      <x-form::close/>
<div class="text-end mt-2">
  <a href="{{route('register')}}" class="text-dark text-decoration-none">{{trans('auth::messages.register')}}</a><br/>
  <a href="{{route('login')}}" class="text-dark text-decoration-none">{{trans('auth::messages.login')}}</a>
</div>
</x-layout>