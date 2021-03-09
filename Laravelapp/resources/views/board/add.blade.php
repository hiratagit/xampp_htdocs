@extends('layouts.test2app')
@section('title', 'Board.add')

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

    <form action="/board/add" method="post">

    <table>
    @csrf
    <tr>
        <th>person id:</th>
        <td><input type="number" name="person_id"></td>
    </tr>
    <tr>
        <th>title: </th>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <th>message</th>
        <td><input type="text" name="message"></td>
    </tr>
    <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
    </tr>
    </table>
    </form>

@endsection

@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection