@extends('layouts.basic')

@section('maincontent')
    <h1>Register</h1>

    {{Form::open(['route'=>'create'])}}
    <div>
        {{Form::label('emailaddress', 'Email Address: ')}}
        {{Form::text('emailaddress')}}
        {{$errors->first('emailaddress', '<span class=”error”>:message<span>')}}
    </div>
    <div>
        {{Form::label('password', 'Password: ')}}
        {{Form::text('password')}}
        {{$errors->first('password')}}
    </div>
    <div>
        {{Form::submit('Create User')}}
    </div>
    {{Form::close()}}
@stop