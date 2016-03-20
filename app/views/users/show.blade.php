@extends('layouts.basic')

@section('maincontent')
    <h1>Users {{$u->id}}</h1>
        <li>{{$u->emailaddress . " " . $u->password}}</li>
@stop