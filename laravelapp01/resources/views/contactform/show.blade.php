@extends('layouts.new-master')

@section('title', 'お問い合わせフォーム履歴')

@section('header')
    @include('components.header')
@endsection

@section('content')
<div class="contactform-show-table table-responsive">
    <p>データ取得方法：{{ $method }}</p>
    <table class="table table-bordered table-sm">
        <tr class="bg-info text-white">
            <th>ID</th>
            <th>名前</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>性別</th>
            <th>種類</th>
            <th>内容</th>
            <th>日付</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->tel }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->gender }}</td>
            <td>{{ $item->kind }}</td>
            <td>{{ $item->text }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection


@section('footer')
    @include('components.footer', ['copyright' => '2021 Laravel Study'])
@endsection