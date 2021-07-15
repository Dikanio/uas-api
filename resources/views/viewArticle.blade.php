@extends('layouts.main')

@section('title', $data->title)

@section('contenasat')
    
@endsection
@section('content')
    <div class="row clearfix mt-5">
        <div class="col-lg-8 col-md-12">
            <div class="card border-0">
                <div class="body">
                    <div class="card-img">
                        <img class="d-block img-fluid" src="https://source.unsplash.com/random/1000x800?sig={{ $data->id }}" alt="First slide">
                    </div>
                    <div class="card-img-overlay">
                        @if(Auth::check())
                            <a class="btn btn-light btn-sm" href="{{ route('article-edit', $data->id) }}">Edit</a>
                            <button class="btn btn-light btn-sm" id="btn-delete">Hapus</button>
                        @endif
                    </div>
                    <h2 class="m-2 p-0">{{ $data->title }}</h2>
                    <small class="text-muted cat m-2">
                        Penulis : {{ $data->author_name }}
                    </small>
                    <p class="mt-3">{!! $data->content !!}</p>
                </div>                        
            </div>
            <div class="card border-0" style="margin-top: 100px;">
                <div class="header">
                    <h2>Comments {{ $total_comment }}</h2>
                </div>
                <div class="body">
                    <ul class="comment-reply list-unstyled">
                        @foreach($comments as $comment)
                            <li class="row clearfix">
                                <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Awesome Image"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">{{ $comment->name }}</h5>
                                    <p>{!! $comment->content !!}</p>
                                    <ul class="list-inline">
                                        <li>{{ $comment->formated_created_at }}</li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>                                        
                </div>
            </div>
            <div class="card border-0" style="margin-top: 100px;padding-bottom: 100px;">
                <div class="header">
                    <h2>Leave a reply</h2>
                </div>
                <div class="body">
                    <div class="comment-form">
                        <form class="row clearfix"  method="post" action="{{ route('article-comment') }}">
                        @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="frm-name" name="frm-name" placeholder="Your Name">
                                    <input type="hidden" class="form-control" id="frm-article-id" name="frm-article-id" placeholder="Name" value="{{ $data->id }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea rows="4" id="frm-content" name="frm-content" class="form-control no-resize" placeholder=""></textarea>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                            </div>                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script type="text/javascript">   
        document.addEventListener('DOMContentLoaded', (event) => {
            tinymce.init({
                selector: 'textarea'
            });
            document.getElementById("btn-delete").addEventListener("click", function(){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        location.replace('{{ route('article-delete', $data->id) }}');                        
                    }
                })
            });
        });
    </script>
@endsection