<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2>※メニュー</h2>
   
    @show
    <hr size="1">

    <div>
    @yield('content')
    </div>
    
    <div>
    @yield('list')
    </div>

    <div>
    @yield('footer')
    </div>
</body>
</html>