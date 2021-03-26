@extends('layouts.new-master')

@section('title', 'お問い合わせ確認')

@section('header')
    @include('components.header')
@endsection

@section('content')

<form action="/contactform/done" method="post">
    @csrf
    <p>{{ $msg }}</p>
    <div class="form-group">
        <label for="name">お名前</label>
        <p class="confirm-output">{{ $input_data['name']  }}</p>
        <input id="name" class="form-control" type="hidden" name="name" value="{{ $input_data['name'] }}">
    </div>
    <div class="form-group">
        <label for="tel">電話番号</label>
        <p class="confirm-output">{{ $input_data['tel'] }}</p>
        <input id="tel" class="form-control" type="hidden" name="tel" value="{{ $input_data['tel'] }}">
    </div>
    <div class="form-group">
        <label for="email">メールアドレス</label>
        <p class="confirm-output">{{ $input_data['email'] }}</p>
        <input id="email" class="form-control" type="hidden" name="email" value="{{ $input_data['email'] }}">
    </div>
    <fieldset class="form-group">
        <legend>性別</legend>
        <p class="confirm-output">{{ $input_data['gender'] === '1' ? '男' : '女' }}</p>
        <input type="hidden" name="gender" value="{{ $input_data['gender'] }}">
    </fieldset>
    <div class="form-group">
        <label for="kind">お問い合わせの種類</label>
        <p class="confirm-output">{{ $input_data['kind'] }}</p>
        <input type="hidden" name="kind" value="{{ $input_data['kind'] }}">
    </div>
    <div class="form-group">
        <label for="exampleTextarea">お問い合わせ内容</label>
        <p class="confirm-output">{!! nl2br($input_data['text']) !!}</p>
        <input type="hidden" name="text" value="{{ $input_data['text'] }}">
    </div>

    <div class="submit-area">
        <input id="form_button_back" class="btn btn-secondary" type="button" onclick="history.back()" value="戻る">
        <input id="form_submit" class="btn btn-primary" type="submit" value="送信">
    </div>
</form>
@endsection


@section('footer')
    @include('components.footer', ['copyright' => '2021 Laravel Study'])
@endsection