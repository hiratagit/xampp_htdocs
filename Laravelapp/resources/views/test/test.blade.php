@extends('layouts.testapp')

@section('title', 'Test')

@section('menubar')
    @parent
    <ul>
        @foreach($menu as $m)
        <li>{{ $m }}</li>
        @endforeach
    </ul>
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述出来ます。</p>
  <p>Controller value<br>'message' = {{ $message }}</p>
  <p>Viewcomposer value<br>'view_message' = {{ $view_message }}</p>
  <h2>ミドルウェから得られた情報</h2>
  @foreach($data as $item)
    <p>{{ $item['name'] }} : {{ $item['mail'] }}</p>
  @endforeach
  <h2>ミドルウェアレスポンスの操作</h2>
  <p>これは、<middleware>google.com</middleware>へのリンクです</p>
  <p>これは、<middleware>yahoo.co.jo</middleware>へのリンクです</p>
  @include('components.message', 
          ['msg_title' => 'CAUTION!', 'msg_content' => 'これはメッセージの表示です'])
@endsection

@section('list')
<p>ここにリストが入ります</p>
<ul>
@each('components.list', $customerList, 'customer')
</ul>
@endsection

@section('footer')
    @include('components.footer', ['copyright' => 'copyright 2021 hirata.'])
@endsection