@extends('layouts.main')
@section('content')
    @foreach($data as $record)
        <div class="my-3">
            <h2 class="m-0 p-0">
                <a href="{{ url('/articles/'. $record->id)}}">{{ $record->title}}</a>
                <p class="m-0 p-0">Writen at: {{ $record->created_at }}</p>
            </h2>        
        </div>
    @endforeach
@endsection