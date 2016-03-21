@extends('layouts/basic')

@section('headers')
    {{HTML::style('css/main.css')}}

@section('maincontent')
<div id="wrapper">
    {{Form::open(array('action' => 'UsersController@upload', 'files'=>true))}}
        <h2 id="header">{{$array[0]}} - <span>{{HTML::link('logout', 'Log out')}}</span></h2>

        <div id="section1">

            <div id="column1">
                <h2>notes</h2>
                {{ Form::textarea('notes', $array[1], ['size' => '16x40']) }}
            </div>

            <div id="column2">
                <h2>websites</h2><h3>click to open</h3>

                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >

            </div>

        </div>

        <div id="section2">

            <div id="column3">
                <h2>images</h2><h3>click for full size</h3>
                <!-- <textarea cols="16" rows="40" id="image" name="image" /></textarea> -->
                {{ Form::file('i') }}
                <img src='{{$array[3][0]}}' alt="">

                <div>


                </div>



            </div>

            <div id="column4">
                <h2>tbd</h2>
                {{ Form::textarea('tbd', $array[2], ['size' => '16x40']) }}
            </div>

        </div>

        <div id="footer">
            {{Form::submit('Save')}}
        </div>
    {{Form::close()}}
</div>


