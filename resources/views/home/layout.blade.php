<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>笑傲江湖 - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('links')
    @stack('hscripts')
</head>
<body>
        <div class="container">
            <form class="form-inline search-main">
                <input type="text" class="form-control" id="keyword" placeholder="请输入感兴趣的内容……">
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
            @yield('content')
        </div>
    <script src="{{asset('js/app.js')}}"></script>
    @stack('scripts')
</body>
</html>