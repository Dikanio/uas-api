@extends('layouts.main')

@section('title', $data->title)

@section
    <h2 class="m-5 p-0">{{ $data->title }}</h2>
    <p class="content p-2">{!! $data->content !!}</p>
@endsection