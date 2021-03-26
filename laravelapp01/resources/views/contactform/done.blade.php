@extends('layouts.new-master')

@section('title', 'お問い合わせフォーム完了')

@section('header')
    @include('components.header')
@endsection

@section('content')
@csrf
<div class="contactform-done alert-info">
<p>お問い合わせありがとうございました。</p>
<p>ご指定のメールアドレスへ確認用メールを送信いたしました。</p>
<a href="/" class="btn btn-primary btn-lg active" role="button" >Topへ戻る</a>
</div>

@endsection


@section('footer')
    @include('components.footer', ['copyright' => '2021 Laravel Study'])
@endsection