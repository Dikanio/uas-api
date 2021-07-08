@extends('layouts.main')
@section('content')    
    @foreach($data as $record)
        @if(Auth::check())        
            <div class="my-3">
                <h2 class="m-0 p-0">
                    <a href="{{ route('article-show', $record->id) }}">{{ $record->title}}</a>
                    <p class="m-0 p-0">Writen at: {{ $record->created_at }}</p>
                </h2>        
            </div>
        @else
            @if ($record->published_at)
                <div class="my-3">
                    <h2 class="m-0 p-0">
                        <a href="{{ route('article-show', $record->id) }}">{{ $record->title}}</a>
                        <p class="m-0 p-0">Writen at: {{ $record->created_at }}</p>
                    </h2>        
                </div>
            @endif
        @endif
    @endforeach
@endsection