<x-layout::auth>
    <x-slot name="header">
        {{trans('auth::messages.register')}}
    </x-slot>
    <x-form::open action="{{route('registerSave')}}" method="post"/>
    <div class="form-floating">
          <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{old('name')}}" id="floatingInput" placeholder="name">
          <label for="floatingInput">{{trans('auth::messages.name')}}</label>
        </div>
        @error('name')
            <div class="small text-danger mt-0"><small>{{ $message }}</small></div>
        @enderror
        <div class="form-floating mt-2">
          <input type="text" name="username" class="form-control @error('username') border-danger @enderror" value="{{old('username')}}" id="floatingInput" placeholder="username">
          <label for="floatingInput">{{trans('auth::messages.username')}}</label>
        </div>
        @error('username')
            <div class="small text-danger mt-0"><small>{{ $message }}</small></div>
        @enderror
        <div class="form-floating mt-2">
          <input type="email" name="email" class="form-control @error('email') border-danger @enderror" value="{{old('email')}}" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">{{trans('auth::messages.email')}}</label>
        </div>
        @error('email')
            <div class="small text-danger mt-0"><small>{{ $message }}</small></div>
        @enderror
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
        @if(config('auth.terms') == true)
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="terms" name="terms" required> <a class="text-dark text-decoration-none" href="{{route('terms')}}" target="blanc">{{trans('auth::messages.terms')}}</a>
            </label>
        </div>
        @endif
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">{{trans('auth::messages.btn_register')}}</button>
        
      <x-form::close/>
      <div class="text-end mt-2">
          <a href="{{route('login')}}" class="text-dark text-decoration-none">{{trans('auth::messages.login')}}</a><br/>
          <a href="{{route('forgot')}}" class="text-dark text-decoration-none">{{trans('auth::messages.forgot')}}</a>
        </div>
</x-layout>