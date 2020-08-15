@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @forelse ($datas as $data)
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="class-title">{{$data->question_title}}</h3>
                <span class="fc-light mr-3">created at: {{$data->created_at}} || viewed: {{$data->view_count}}</span>
            </div>

            <div class="card-body">
                <p>{{$data->question_body}}</p>
                <form action="/question/{{ $data->question_id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger btn-md float-right">
                </form>
                <a href="/question/{{ $data->question_id }}/edit" class="btn btn-md btn-primary float-right mr-2">edit</a>
                <a href=""class="btn btn-success btn-md float-right mr-2">check answer</a><!--kepikirannya klo di klik pindah kehalaman show buat jawab-->
            </div>
        </div>
    @empty
        <h1>No Discussion From You</h1>
    @endforelse
</div>
@endsection
