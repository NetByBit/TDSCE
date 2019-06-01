@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-4">
            <div class="view overlay rounded z-depth-3">
                <img class="img-fluid" src="{{ $project->image }}">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <h3 class="h2-responsive font-weight-bold mb-5">{{ $project->name }}</h3>
            <p>{{ $project->description }}</p>
        </div>
    </div>

    <h3 class="font-weight-bold mb-3">Comments</h3>
    <section class="my-5">
        <div class="row">
            <div class="col-md-12">
                 <div class="mdb-feed">
                    @forelse($project->comments as $comment)
                        <div class="news">
                            <div class="label">
                                <img src="{{ $comment->user->image }}" class="rounded-circle z-depth-1-half">
                            </div>
                            <div class="excerpt">
                                <div class="brief">
                                    <a class="name">{{ $comment->user->name }}</a>
                                    <div class="date">{{ $comment->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="added-text">{{ $comment->text }}</div>
                            </div>
                        </div>
                    @empty
                        <p>No comments to show</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
