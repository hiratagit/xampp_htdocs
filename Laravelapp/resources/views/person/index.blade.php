@extends('layouts.test2app')
@section('title', 'EloquentEloquent')

@section('header')
    @include('components.header')
@endsection

@section('content')

    <table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name}}</td>
        <td>{{ $item->mail }}</td>
        <td>{{ $item->age }}</td>
    </tr>
    @endforeach
    </table>

    @foreach($items as $item)
        <p>{{ $item->getData() }}</p>
    @endforeach

@endsection



@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection