@extends('layouts.test2app')
@section('title', 'データベースのレコード更新')

@section('header')
    @include('components.header')
@endsection

@section('content')
    <form action="/database/edit" method="post">
    <table>
    @csrf
    <input type="hidden" name="id" value="{{ $form->id }}">
    <tr>
        <th>name: </th>
        <td><input type="text" name="name" value="{{ $form->name }}"></td>
    </tr>
    <tr>
        <th>mail: </th>
        <td><input type="text" name="mail" value="{{ $form->mail }}"></td>
    </tr>
    <tr>
        <th>age: </th>
        <td><input type="text" name="age" value="{{ $form->age }}"></td>
    </tr>
    <tr>
        <th></th>
        <td><input type="submit" name="send"></td>
    </tr>
    
    </table>
    </form>
@endsection

@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection