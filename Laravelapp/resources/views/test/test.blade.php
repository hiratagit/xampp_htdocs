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