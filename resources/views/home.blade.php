@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }} by {{ $post->author->name }}</div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->toDayDateTimeString() }}</h6>
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
