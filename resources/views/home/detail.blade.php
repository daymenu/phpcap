@extends('home.layout')

@push('head')
<title>{{$article->title}}_笑傲江湖</title>
<meta content="{{$article->keywords}}">
@endpush

@push('links')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@push('hscripts')
    
@endpush

@push('scripts')
    
@endpush

@section('content')
<div class="page-header">
    <h2 class="h2 el-center">{{$article->title}}</h2>
    <div class="el-center">
        <p>
            <span  class="text-primary">创作人: {{$article->author}}</span> 
            <span class="text-muted">日期: {{date('Y-m-d H:i:s', $article->publishd_time)}}</span>
        </p>
    </div>
</div>

{!! $article->content !!}
@endsection