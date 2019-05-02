@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-md-4">
            <img src="{{ $project->image }}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <h3 class="mb-5">{{ $project->name }}</h3>
            <p>{{ $project->description }}</p>
        </div>
    </div>
    <ul class="list-unstyled">
        @foreach ($project->comments as $comment)
            <li class="media mb-1">
                <img src="http://placehold.it/500" width="64" class="mr-3 img-fluid" >
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $comment->user->name }}</h5>
                    {{ $comment->text }}
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
