@extends('layouts.app')

@section('content')
@forelse ($datas as $data)
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="class-title">{{$data->question_title}}</h3>
            <span class="fc-light mr-3">created at: {{$data->created_at}} || viewed: {{$data->view_count}} || author: {{$data->author->name}} || reputation poin: {{$data->author->reputation_point}}</span>
        </div>

        <div class="card-body">
            <p>{{$data->question_body}}</p>
            <a href="/question/explore/{{ $data->question_id }}"class="btn btn-success btn-md float-right mr-2">Detail</a>
        </div>
    </div>
@empty
    <h1>No Discussion</h1>
@endforelse
@endsection
