@extends('layouts.main')

@section('title', 'New Article')

@section
    <h2 class="m-5">New Article</h2>
    <form method="post">
    @csrf
    <div class="mb-3">
        <label for="frm-title" class="form-label">Title</label>
    </div>
@endsection