@extends('layouts.new-master')

@section('title', 'お問い合わせフォーム')

@section('header')
    @include('components.header')
@endsection

@section('content')

<form action="/contactform" method="post">
    @csrf

    @unless(count($errors) > 0)
    <div>
        <p>{{ $msg }}</p>
    </div>
    @endunless

    <!-- @if(count($errors) > 0)
        <div class="contact-alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif -->
    <div class="form-group">
        <label for="name">お名前</label>
        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <div class="contact-alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tel">電話番号</label>
        <input id="tel" class="form-control" type="text" name="tel" value="{{ old('tel') }}">
        @error('tel')
        <div class="contact-alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">メールアドレス</label>
        <input id="email" class="form-control" type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <div class="contact-alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>
    <fieldset class="form-group">
        <legend>性別</legend>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" id="gender1" value="1">
            男性
            </label>
        </div>
        <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" id="gender2" value="2" >
            女性
            </label>
        </div>
        @error('gender')
        <div class="contact-alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </fieldset>
    <div class="form-group">
        <label for="kind">お問い合わせの種類</label>
        <select name="kind" class="form-control" id="contactkind">
            <option value="見積依頼">見積依頼</option>
            <option value="仕事の依頼">仕事の依頼</option>
            <option value="資料請求">資料請求</option>
            <option value="その他">その他</option>
        </select>
        @error('kind')
        <div class="contact-alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleTextarea">お問い合わせ内容</label>
        <textarea name="text" class="form-control" id="exampleTextarea" rows="3">{{ old('text') }}</textarea>
        @error('text')
        <div class="contact-alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>

    @if(count($errors) > 0)
        <div class="contact-alert alert-warning">
            <p>入力に誤りがあります。</p>
        </div>
    @endif

    <input id="form_submit" class="btn btn-primary" type="submit" value="送信">
</form>
@endsection


@section('footer')
    @include('components.footer', ['copyright' => '2021 Laravel Study'])
@endsection