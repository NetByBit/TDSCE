@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center font-weight-bold mb-5">Latest Ideas</h2>
        @foreach ($ideas->chunk(3) as $ideasRow)
            <div class="row mb-3">
                @foreach ($ideasRow as $idea)
                    <div class="col-lg mb-lg-0 mb-4">
                        <div class="view overlay rounded z-depth-3 mb-4">
                            <img class="img-fluid w-100" src="{{ $idea->image }}">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <h4 class="font-weight-bold mb-3"><strong>{{ $idea->name }}</strong></h4>
                        <p>by <a class="font-weight-bold">{{ $idea->user->name }}</a>, {{ $idea->created_at->diffForhumans() }}</p>
                        <p class="dark-grey-text">{{ Str::limit($idea->description, 70) }}</p>
                        <a class="btn btn-blue text-white" href="/ideas/{{ $idea->id }}">View</a>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{ $ideas->links()}}

    </div>

    @can('create', App\Project::class)
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating green" href="/ideas/create">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endcan

@endsection
