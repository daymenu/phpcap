<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>笑傲江湖</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <ul>
        @foreach ($categorys as $category)
        <li><a href="{{url('list/' . $category->id)}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</body>
</html>