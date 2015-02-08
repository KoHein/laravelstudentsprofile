@extends('layout')

@section('content')
    <div class="form-box">
    <h1>Register</h1>
 
    {{ Form::open(array('controller' => 'UserController@postRegister', 'files'=>true)) }}
        
        {{ Form::file('photo', Input::old('photo'), array('placeholder' => 'Photo'))}}
        @if ($errors->first('photo'))
            <p class="error">{{ $errors->first('photo') }}</p>
        @endif

        {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username'))}}
        @if ($errors->first('username'))
            <p class="error">{{ $errors->first('username') }}</p>
        @endif    
            
        {{ Form::password('password' , array('placeholder' => 'Password'))}}
        @if ($errors->first('password'))
            <p class="error">{{ $errors->first('password') }}</p>
        @endif
        
        {{ Form::password('confirm-password' , array('placeholder' => 'Confirm Password'))}}
        @if ($errors->first('confirm-password'))
            <p class="error">{{ $errors->first('confirm-password') }}</p>
        @endif

        {{ Form::text('name', Input::old('name'), array('placeholder' => 'Nick Name'))}}
        @if ($errors->first('name'))
            <p class="error">{{ $errors->first('name') }}</p>
        @endif
    
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email'))}}
        @if ($errors->first('email'))
            <p class="error">{{ $errors->first('email') }}</p>
        @endif

        {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'PhoneNumber'))}}
        @if ($errors->first('phone'))
            <p class="error">{{ $errors->first('phone') }}</p>
        @endif

        {{ Form::text('address', Input::old('address'), array('placeholder' => 'Address'))}}
        @if ($errors->first('address'))
            <p class="error">{{ $errors->first('address') }}</p>
        @endif

        {{ Form::text('fromadd', Input::old('fromadd'), array('placeholder' => 'HomeTown'))}}
        @if ($errors->first('fromadd'))
            <p class="error">{{ $errors->first('fromadd') }}</p>
        @endif

        {{ Form::text('work', Input::old('work'), array('placeholder' => 'Your Work'))}}
        @if ($errors->first('work'))
            <p class="error">{{ $errors->first('work') }}</p>
        @endif

        {{ Form::text('company', Input::old('company'), array('placeholder' => 'Company'))}}
        @if ($errors->first('company'))
            <p class="error">{{ $errors->first('company') }}</p>
        @endif

        {{ Form::submit('Register', array('class' => 'btn'))}}
    {{ Form::close() }}
    </div>
@stop