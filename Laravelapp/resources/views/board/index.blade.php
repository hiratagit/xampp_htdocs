@extends('layouts.test2app')
@section('title', 'Board')

@section('header')
    @include('components.header')
@endsection

@section('content')

    <table>
    <tr>
        <th>Messgae</th><th>Name</th>
    </tr>
    @foreach($items as $item)
        @if($item->person != null)
        <tr>
            <td>{{ $item->message }}</td>
            <td>{{ $item->person->name }}</td>
        </tr>
        @endif
    @endforeach
    </table>

@endsection



@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection