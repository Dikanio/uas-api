@extends('layouts.main')

@section('title', 'Edit Article')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="m-5">Edit Article</h2>
            <form method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="frm-title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="frm-title" name="frm-title" placeholder="Article Title" value="{{ $data->title }}">
                </div>
                <div class="mb-3">
                    <label for="frm-status" class="form-label">Status</label>
                    <select name="frm-status" class="form-control">
                        <option value="published" {{ $data->published_at ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ empty($data->published_at) ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="frm-content" class="form-label">Content</label>
                    <textarea class="form-control" id="frm-content" name="frm-content" rows="3">{!! $data->content !!}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
    
@endsection
@section('page-script')
    <script type="text/javascript">   
        document.addEventListener('DOMContentLoaded', (event) => {
            tinymce.init({
                selector: 'textarea'
            });
        });
    </script>
@endsection