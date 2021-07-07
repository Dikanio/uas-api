@extends('layouts.main')

@section('title', 'New Article')

@section('content')
    <h2 class="m-5">New Article</h2>
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="frm-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="frm-title" name="frm-title" placeholder="Article Title">
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
@parent
    <script type="text/javascript">
        // window.addEventListener('DomContentLoad', (event) => {
            tinymce.init({
                selector: 'textarea'
            });

        // });
@endsection