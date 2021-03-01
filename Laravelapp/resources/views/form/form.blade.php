@extends('layouts.formapp')
@section('title', 'フォーム送信')

@section('header')
    @include('components.header')
@endsection

@section('form-content')
<p>{{ $msg }}</p>

<form action="/form" method="post">
    @csrf
    <p><label for="name">name: <input id="name" type="text" name="name" value="{{ old('name') }}"></label></p>
    @if($errors->has('name'))
    <p style="color: red"><small>{{ $errors->first('name') }}</small></p>
    @endif

    <p>選択: 
    <label for="radio-mail">メール<input id="radio-mail" type="radio" name="radio" value="mail" {{ old('radio') === 'mail'? 'checked': '' }} ></label>
    <label for="radio-age">年齢<input id="radio-age" type="radio" name="radio" value="age"  {{ old('radio') === 'age'? 'checked': '' }}></label>
    </p>
    @if($errors->has('radio'))
    <p style="color: red"><small>{{ $errors->first('radio') }}</small></p>
    @endif

    <p><label for="intext">記入欄: <input id="intext" type="text" name="intext" value="{{ old('intext') }}"></label></p>
    @if($errors->has('intext'))
    <p style="color: red"><small>{{ $errors->first('intext') }}</small></p>
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
</form>
@endsection

@section('footer')
    @include('components.footer', ['copyright' => '2020 handclap All Right Reserve'])
@endsection