@extends('layouts.formapp')
@section('title', 'クッキー学習')

@section('header')
    @include('components.header')
@endsection

@section('form-content')
@isset($msg)
<p>{{ $msg }}</p>
@endisset

@if(count($errors) > 0)
<p>入力値に問題があります。再入力してください。</p>
@endif

<form action="/cookie" method="post">
    @csrf

    @if($errors->has('msg'))
    <p style="color: red">ERROR: <small>{{ $errors->first('msg') }}</small></p>
    @endif
    <p><label for="message">Message: <input id="message" type="text" name="msg" value="{{ old('msg') }}"></label></p>
    <p><input type="submit" value="send"></p>
</form>
@endsection

@section('footer')
    @include('components.footer', ['copyright' => '2020 handclap All Right Reserve'])
@endsection