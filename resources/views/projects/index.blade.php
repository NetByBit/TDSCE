@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @foreach ($projects->chunk(3) as $projectsRow)
        <div class="card-deck mb-4">
            @foreach ($projectsRow as $project)
                <div class="card">
                    <img src="{{ $project->image }}" class="card-img-top">
                    <div class="card-body">
                        <a href="{{ route('projects.show', $project) }}">
                            <h5 class="card-title">{{ $project->name }}</h5>
                        </a>
                        <p class="card-text">{{ Str::limit($project->description) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    {{ $projects->links()}}
</div>
@endsection
