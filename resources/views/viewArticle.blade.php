@extends('layouts.main')

@section('title', $data->title)

@section('content')
    <h2 class="m-5 p-0">{{ $data->title }}</h2>@if(Auth::check())<a href="{{ route('article-edit', $data->id) }}">Edit</a>@endif
    <h5 class="m-5 p-0">Penulis : {{ $data->author_name }}</h5>
    <p class="content p-2">{!! $data->content !!}</p>
@endsection