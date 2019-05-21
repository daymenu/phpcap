@extends('home.layout')

@section('title', '详情')

@push('links')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@push('hscripts')
    
@endpush

@push('scripts')
    
@endpush

@section('content')
<h2 class="h2 el-center">{{$article->title}}</h2>
{!! $article->content !!}
@endsection