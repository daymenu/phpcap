@extends('home.layout')

@section('title', '首页')

@push('links')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@push('hscripts')
    
@endpush

@push('scripts')
    
@endpush

@section('content')
<ul>
    @foreach ($categorys as $category)
    <li><a href="{{url('list/' . $category->id)}}">{{$category->name}}</a></li>
    @endforeach
</ul>
@endsection