@extends('layouts.test2app')
@section('title', 'EloquentEloquent')

@section('header')
    @include('components.header')
@endsection

@section('content')

<form action="/person/find" method="post">
    @csrf
    <input type="text" name="input_id" value="{{ $input_id }}">
    <input type="submit" value="find">
    </form>

    @if(isset($item))
    <table>
    <tr>
        <th>Data</th>
    </tr>
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
    </table>
    @endif

@endsection



@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection