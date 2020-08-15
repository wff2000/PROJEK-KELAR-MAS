@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Make A Discussion</h3>
        </div>
        <div class="card-body">
            <form role="form" method="POST" action="/question">
                @csrf
                @method("POST")
                <div class="form-group">
                  <label for="question_title">question_title</label>
                  <input type="text" class="form-control" id="question_title" name="question_title" placeholder="Masukan question_title" value="{{ old('question_title','') }}">
                </div>
                @error('question_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="question_body">question_body</label>
                    <input type="text" class="form-control" id="question_body" name="question_body" placeholder="Masukan question_body Anda" value="{{ old('question_body','') }}">
                </div>
                @error('question_body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="Masukan tag Anda, contoh: #laravel#javascript ..." value="{{ old('tag','') }}">
                </div>
                @error('tag')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
