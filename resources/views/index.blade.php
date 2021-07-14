@extends('layouts.main')
@section('content')   
    <div class="col-12"> 
        <div class="row">
            @php $count = 1 @endphp
            @foreach($data as $record) 
                @php
                    $user = App\Models\User::find($record->author);
                    $author = '-';
                    if ($user) $author = $user->name;
                    $created_at = Carbon\Carbon::parse($record->created_at)->format("d F Y");

                    $total_comment = App\Models\Comment::where('article_id', $record->id)->count();
                @endphp
                @if(Auth::check())           
                    <div class="col-4 mt-5">
                        <div class="card">
                        <img class="card-img" src="https://source.unsplash.com/random/1000x1000?sig={{ $count }}" alt="img-{{ $count }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $record->title}}</h4>
                                <small class="text-muted cat">
                                    <i class="bi bi-people-fill text-info"></i> {{ $author }}
                                </small>
                                <p class="card-text">{{ $record->title}}</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('article-show', $record->id) }}" class="btn btn-info">Read More</a>
                                </div>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                                <div class="views">{{ $created_at }}
                                </div>
                                <div class="stats">
                                    <i class="bi bi-chat-fill"></i> {{ $total_comment }}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @if ($record->published_at)
                        <div class="col-4 mt-5">
                            <div class="card">
                                <img class="card-img" src="https://source.unsplash.com/random/1000x1000?sig={{ $count }}" alt="img-{{ $count }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $record->title}}</h4>
                                    <small class="text-muted cat">
                                        <i class="bi bi-people-fill text-info"></i> {{ $author }}
                                    </small>
                                    <p class="card-text">{{ $record->title}}</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('article-show', $record->id) }}" class="btn btn-info">Read More</a>
                                    </div>
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                                    <div class="views">{{ $created_at }}
                                    </div>
                                    <div class="stats">
                                        <i class="bi bi-chat-fill"></i> {{ $total_comment }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif   
            @php $count++ @endphp
            @endforeach
        </div>
    </div>
@endsection