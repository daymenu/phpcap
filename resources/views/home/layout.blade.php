<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>笑傲江湖 - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    @stack('links')
    @stack('hscripts')
</head>
<body>
        <div class="container">
            <nav class="navbar navbar-inverse navbar-collapse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" width="40px" alt="phpcap"></a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="{{$categoryId ? '': 'active'}}"><a href="/"><span class="sr-only">(current)</span>首页</a></li>
                        @foreach ($categorys as $category)
                        <li class="{{$categoryId== $category->id? 'active': ''}}"><a href="{{url('list/' . $category->id)}}"><span class="sr-only">(current)</span>{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                    <form class="navbar-form navbar-right" action="{{url('/search')}}">
                        <div class="form-group">
                        <input type="text" name="kw" class="form-control" placeholder="输入你感兴趣的内容...">
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            @yield('content')
            <footer class="footer el-center">
                <p>晋ICP备16002062号</p>
                <p>笑傲江湖</p>
            </footer>
        </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @stack('scripts')
</body>
</html>