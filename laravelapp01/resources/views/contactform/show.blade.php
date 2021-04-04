@extends('layouts.new-master')

@section('title', 'お問い合わせフォーム履歴')

@section('header')
    @include('components.header')
@endsection

@section('content')
<div class="contactform-show-table">
    <p>データ取得方法：{{ $method }}</p>
    <table class="table table-bordered table-sm">
        <tr class="bg-info text-white">
            <th><a href="/show?sort=id">ID</a></th>
            <th><a href="/show?sort=name">名前</a></th>
            <th><a href="/show?sort=tel">電話番号</a></th>
            <th><a href="/show?sort=email">メールアドレス</a></th>
            <th><a href="/show?sort=gender_id">性別</a></th>
            <th><a href="/show?sort=kind">種類</a></th>
            <th><a href="/show?sort=text">内容</a></th>
            <th><a href="/show?sort=created_at">日付</a></th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->tel }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->getGenderName() }}</td>
            <td>{{ $item->kind }}</td>
            <td>{!! nl2br($item->text) !!}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </table>
    {{ $items->appends(['sort' => $sort])->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection


@section('footer')
    @include('components.footer', ['copyright' => '2021 Laravel Study'])
@endsection