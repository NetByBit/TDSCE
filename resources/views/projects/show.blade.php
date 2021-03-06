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
            <p>Link: <a class="m-auto" href="{{ $project->url }}">{{ $project->url }}</a></p>
            <p>{{ $project->description }}</p>
        </div>
    </div>

    @component('components.comments', ['comments' => $project->comments])
    @endcomponent
</div>
@endsection
