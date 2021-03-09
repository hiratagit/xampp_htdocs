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
    @foreach($hasItems as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name}}</td>
        <td>{{ $item->mail }}</td>
        <td>{{ $item->age }}</td>
    </tr>
    @endforeach
    </table>


    <table>
        <tr><th>Person</th><th>Board</th></tr>
    @foreach($hasItems as $item)
         <tr>
            <td>{{ $item->getData() }}</td>
            <td>
                @if($item->board != null)
                    @foreach($item->board as $obj)
                    {{ $obj->getData() }}<br>
                    @endforeach
                @endif
            </td>
         </tr>
    @endforeach
    </table>

    <table>
        <tr>
            <th>Person</th>
        </tr>
        @foreach($noItems as $item)
        <tr>
            <td>{{ $item->getData() }}</td>
        </tr>
        @endforeach
    </table>

@endsection



@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection