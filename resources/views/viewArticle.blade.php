@extends('layouts.main')

@section('title', $data->title)

@section('content')
    <h2 class="m-5 p-0">{{ $data->title }}</h2>
    @if(Auth::check())
        <a href="{{ route('article-edit', $data->id) }}">Edit</a>
        <a href="{{ route('article-delete', $data->id) }}">Hapus</a>
    @endif
    <h5 class="m-5 p-0">Penulis : {{ $data->author_name }}</h5>
    <p class="content p-2">{!! $data->content !!}</p>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Comment</th>
                </tr>                
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form method="post" action="{{ route('article-comment') }}">
        @csrf
        <div class="mb-3">
            <label for="frm-title" class="form-label">Name</label>
            <input type="text" class="form-control" id="frm-name" name="frm-name" placeholder="Name">
            <input type="hidden" class="form-control" id="frm-article-id" name="frm-article-id" placeholder="Name" value="{{ $data->id }}">
        </div>
        <div class="mb-3">
            <label for="frm-content" class="form-label">Content</label>
            <textarea class="form-control" id="frm-content" name="frm-content" rows="3"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </div>
    </form>
@endsection
@section('page-script')
    <script type="text/javascript">    
    console.log('test di luar');
        document.addEventListener('DOMContentLoaded', (event) => {
            tinymce.init({
                selector: 'textarea'
            });
            console.log('test');
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
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        });
    </script>
@endsection