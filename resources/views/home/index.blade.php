@extends('home.layout')

@push('head')
<title>首页_笑傲江湖</title>
@endpush

@push('links')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@push('hscripts')
    
@endpush

@push('scripts')
    
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">
        <ul>
            @foreach ($news as $new)
                @if ($loop->index == 0)
                <div class="jumbotron">
                    <h1>{{$new->title}}</h1>
                    <p>{!! $new->content !!}</p>
                    <p><a class="btn btn-primary btn-lg" href="{{url('detail/'. $new->id)}}" role="button">查看全文</a></p>
                </div>
                @else
                    <div class="list-group">
                        <a href="{{url('detail/' . $new->id)}}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{$new->title}}</h4>
                            <p class="list-group-item-text">{{$new->title}}</p>
                        </a>
                    </div>
                @endif
            @endforeach
        </ul>
    </div>
</div>
@endsection