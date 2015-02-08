@extends('layout')
@section('content')
    <div class="form-box">
    <h1>Change Password</h1>
 
    {{ Form::open(array('controller' => 'UserController@postEdit')) }}
                
        {{ Form::password('new-password' , array('placeholder' => 'Newpassword'))}}
        @if ($errors->first('new-password'))
            <p class="error">{{ $errors->first('new-password') }}</p>
        @endif
         <p>Your Current Password is <strong> {{ Auth::user()->password }}</strong></p>

               
        {{ Form::text('name', Input::old('name'), array('placeholder' => 'Nick Name'))}}
        @if ($errors->first('name'))
            <p class="error">{{ $errors->first('name') }}</p>
        @endif
         <p>Your Current Name is <strong> {{ Auth::user()->name }}.</strong></p>
  
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email'))}}
        @if ($errors->first('email'))
            <p class="error">{{ $errors->first('email') }}</p>
        @endif
        <p>Your Current Email is <strong> {{ Auth::user()->phone }}.</strong></p>

        {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'PhoneNumber'))}}
        @if ($errors->first('phone'))
            <p class="error">{{ $errors->first('phone') }}</p>
        @endif
        <p>Your Current Phone is <strong> {{ Auth::user()->email }}.</strong></p>

        {{ Form::text('address', Input::old('address'), array('placeholder' => 'Address'))}}
        @if ($errors->first('address'))
            <p class="error">{{ $errors->first('address') }}</p>
        @endif
        <p>Your Current Address is <strong> {{ Auth::user()->address }}.</strong></p>

        {{ Form::text('company', Input::old('company'), array('placeholder' => 'Company'))}}
        @if ($errors->first('company'))
            <p class="error">{{ $errors->first('company') }}</p>
        @endif
        <p>Your Current Company is <strong> {{ Auth::user()->company }}.</strong></p>

        

        <a href="{{ action('UserController@getLogout') }}" class="btn">Logout</a>
       
        {{ Form::submit('Save', array('class' => 'btn'))}}
    {{ Form::close() }}
    </div>
@stop