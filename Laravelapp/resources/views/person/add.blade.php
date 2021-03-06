@extends('layouts.test2app')
@section('title', 'EloquentEloquent')

@section('header')
    @include('components.header')
@endsection

@section('content')

@if(count($errors) > 0)
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>

@endif

<form action="/person/add" method="post">
    <table>
    @csrf
        <tr><th>name: </th><td><input type="text" name="name" value="{{ old('name')}}"></td></tr>
        <tr><th>mail: </th><td><input type="text" name="mail" value="{{ old('mail') }}"></td></tr>
        <tr><th>age: </th><td><input type="text" name="age" value="{{ old('age') }}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
</form>
@endsection



@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection