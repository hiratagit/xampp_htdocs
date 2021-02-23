<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>フォームのテスト</h1>
    @if($msg !== '')
    <p>{{ $msg }}</p>
    @else
    <p>何か入力してください。</p>
    @endif
    @empty($msg)
    <p>$msgはempty</p>
    @endempty

    @foreach($items as $item)
    @if($loop->first)
    <p>ループ開始</p>
    <ul>
    @endif
    <li>{{ $item }}</li>
    @if($loop->last)
    </ul>
    <p>これにてループ終了</p>
    @endif
    @endforeach



    <h2>PHPスクリプト</h2>
    @php
    print_r($items);
    print '<br>';
    var_dump($items);
    @endphp

    <form action="/test/form" method="post">
    @csrf
    <input type="text" name="name">
    <input type="submit" value="送信">
    </form>
</body>
</html>