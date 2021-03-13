@extends('layouts.helloapp')
<style>
.patination { font-size: 10px; }
.pagination li { display: inline-block; }
tr th { background-color: #888;}
tr th a:link {color: white;}
tr th a:visited {color: white;}
tr th a:hover {color:white;}
tr th a:active {color: white;}
/* svg {width: 25px; height: 25px;} */
</style>

@section('title', 'Index')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')

    @if (Auth::check())
        <p>USER: {{ $user->name . '( '. $user->email. ' )' }}</p>
    @else
        <p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
    @endif
    <table>
        <tr>
            <th><a href="/hello/?sort=name">Name</a></th>
            <th><a href="/hello/?sort=mail">Mail</a></th>
            <th><a href="/hello/?sort=age">Age</a></th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name}}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->age }}</td>
        </tr>
        @endforeach
    </table>
    {{ $items->appends([ 'sort' => $sort ])->links('vendor.pagination.bootstrap-4') }}
@endsection

@section('footer')
copyright 2020 tuyonao.
@endsection