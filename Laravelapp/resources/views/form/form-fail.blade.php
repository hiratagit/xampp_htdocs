@extends('layouts.formapp')
@section('title', 'フォーム送信')

@section('header')
    @include('components.header')
@endsection

@section('form-content')
<p>{{ $msg }}</p>

@if(count($errors) > 0) 
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<form action="/form" method="post">
    @csrf
    <p><label for="name">name: <input id="name" type="text" name="name" value="{{ old('name') }}"></label></p>
    @if($errors->has('name'))
    <p style="color: red"><small>{{ $errors->first('name') }}</small></p>
    @endif


    <p><label for="mail">mail: <input id="mail" type="text" name="mail" value="{{ old('mail') }}"></label></p>
    @error('mail')
    <p style="color: red"><small>{{ $message }}</small></p>
    @enderror


    <p><label for="age">age: <input id="age" type="text" name="age" value="{{ old('age') }}"></label></p>
    @if($errors->has('age'))
        @foreach ($errors->get('age') as $er)
            <p style="color: red"><small>{{ $er }}</small></p>
        @endforeach
    @endif
    <p><input type="submit" value="send"></p>
    <p><input type="button" onclick="history.back()" value="back"></p>
</form>

@endsection

@section('footer')
    @include('components.footer', ['copyright' => '2020 handclap All Right Reserve'])
@endsection