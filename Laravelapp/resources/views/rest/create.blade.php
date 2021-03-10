<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/rest" method="post">
    <table>
        @csrf
        <tr>
            <th>message: </th>
            <td><input type="text" name="message" value="{{ old('message') }}"></td>

        </tr>
        <tr>
            <th>url: </th>
            <td><input type="text" name="url" value="{{ old('url') }}"></td>

        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
    </form>
</body>
</html>