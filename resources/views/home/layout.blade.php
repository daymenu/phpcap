<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>笑傲江湖 - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')}}">
    @stack('links')
    @stack('hscripts')
</head>
<body>
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">phpcap</a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @foreach ($categorys as $category)
                        <li><a href="{{url('list/' . $category->id)}}"><span class="sr-only">(current)</span>{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            @yield('content')
        </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    @stack('scripts')
</body>
</html>