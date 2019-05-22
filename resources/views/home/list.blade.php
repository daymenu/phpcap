@extends('home.layout')

@push('head')
<title>{{$categoryName}}_笑傲江湖</title>
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
        @empty($articles->total())
        <div class="alert alert-danger" role="alert">该栏目还没有文章哦,小编正在快马加鞭!</div>
        @endempty
        <div class="list-group">
            @foreach ($articles as $article)
            <a href="{{url('detail/' . $article->id)}}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$article->title}}</h4>
                <p class="list-group-item-text">{{$article->title}}</p>
                <p class="list-group-item-text">{{$article->title}}</p>
            </a>
            @endforeach
        </div>
        <div class="el-center">
            {{$articles->links()}}
        </div>
    </div>
</div>
@endsection