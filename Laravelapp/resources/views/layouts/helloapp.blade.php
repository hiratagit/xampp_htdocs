<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
    <title>@yield('title')</title>
    <style>
        body { font-size: 16px; color: #999; margin: 5px;}
        h1 {font-size: 50px; text-align: right; color: #f6f6f6;
            margin: -20px 0px -30px 0px; letter-spacing: -4px; }
        ul { font-size: 12px;}
        hr { margin: 25px 100px; border-top: 1px dashed #ddd; }
        .menutitle { font-size: 14px; font-weight: bold; margin: 0px;}
        .content { margin: 10px;}
        .footer { text-align: right; font-size: 10px; margin: 10px;
                border-bottom: 1px solid #ccc; color: #ccc; }
    </style>
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
            <li>Home</li>
            <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
    @yield('content')
    </div>
    <div class="footer">
    @yield('footer')
    </div>
</body>
</html>