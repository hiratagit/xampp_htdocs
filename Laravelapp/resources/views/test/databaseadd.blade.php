@extends('layouts.test2app')
@section('title', 'データベースのレコード作成')

@section('header')
    @include('components.header')
@endsection

@section('content')
    <form action="/database/add" method="post">
    <table>
    @csrf
    <tr>
        <th>name: </th>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <th>mail: </th>
        <td><input type="text" name="mail"></td>
    </tr>
    <tr>
        <th>age: </th>
        <td><input type="text" name="age"></td>
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