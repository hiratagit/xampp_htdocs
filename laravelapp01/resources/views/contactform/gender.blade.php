@extends('layouts.new-master')

@section('title', '性別表示')

@section('header')
    @include('components.header')
@endsection

@section('content')
@csrf
<table>
    <tr><th>id</th><th>性別</th></tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->gender_name }}</td>
    </tr>
    @endforeach
</table>

@endsection


@section('footer')
    @include('components.footer', ['copyright' => '2021 Laravel Study'])
@endsection