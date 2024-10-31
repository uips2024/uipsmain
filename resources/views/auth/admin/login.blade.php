@extends('layouts.auth')
@section('title')
  {{__('Login Admin Panel')}}
@endsection
@section('content')

<form action="{{route('admin.auth.login_submit')}}" method="post" class="validate-form">


    <span class="login100-form-title p-b-43">
        {{__('United International Private School')}}
        {{__('Management System')}}
    </span>
    
    
    <div class="wrap-input100 validate-input @if($errors->has('email')) error-validation @endif">
        <input class="input100" type="email" name="email" id="email" value="{{old('email')}}" required>
        <span class="focus-input100"></span>
        <span class="label-input100">{{__('Username')}}</span>
    </div>
    
    
    <div class="wrap-input100 validate-input @if($errors->has('password')) error-validation @endif">
        <input class="input100" type="password" name="password" id="password" required>
        <span class="focus-input100"></span>
        <span class="label-input100">{{__('Password')}}</span>
    </div>

    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">
                {{__('Remember Me')}}
            </label>
        </div>

        <div>
            <a href="{{route('admin.reset.mail')}}" class="txt1">
                {{__('Forgot Password?')}}
            </a>
        </div>
    </div>


    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
            {{__('Login')}}
        </button>
    </div>
    <br>
    
    <span class="login100-form-title mt-10">
        <span class="h6">{{__('New here ?')}}</span> 
        <a href="{{route('admin.auth.register')}}">
           <span class="h6">{{__('Create Account')}}</span> 
        </a>
    </span>

</form>

@endsection

@section('scripts')
@endsection