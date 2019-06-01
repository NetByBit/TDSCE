@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h2 class="text-center font-weight-bold mb-5">Latest Projects</h2>
        @foreach ($projects->chunk(3) as $projectsRow)
            <div class="row mb-3">
                @foreach ($projectsRow as $project)
                    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

                        <div class="view overlay rounded z-depth-3 mb-4">
                            <img class="img-fluid" src="{{ $project->image }}">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <h4 class="font-weight-bold mb-3"><strong>{{ $project->name }}</strong></h4>
                        <p>by <a class="font-weight-bold">{{ $project->user->name }}</a>, {{ $project->created_at->diffForhumans() }}</p>
                        <p class="dark-grey-text">{{ Str::limit($project->description) }}</p>
                        <a class="btn btn-blue text-white btn-rounded btn-md" href="{{ route('projects.show', $project) }}">View</a>

                    </div>
                @endforeach
            </div>
        @endforeach
        {{ $projects->links()}}

    </div>
    @can('create', App\Project::class)
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating green" href="/projects/create">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endcan

@endsection
