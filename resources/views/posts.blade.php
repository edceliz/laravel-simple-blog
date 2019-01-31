@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ $post->title }}</div>
                        <div class="col text-right">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('post.show', $post->id) }}" 
                                onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>
                            <form id="delete-form" action="{{ route('post.show', $post->id) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </div>

                    <!-- <ul class="navbar-nav mr-auto">
                        {{ $post->title }}
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li><a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a></li>
                        <li><a href="" class="btn btn-primary"></a></li>
                    </ul> -->
                </div>

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
