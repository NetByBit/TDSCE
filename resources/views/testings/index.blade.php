@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center font-weight-bold mb-5">Latest testings</h2>
        @foreach ($testings->chunk(3) as $testingsRow)
            <div class="row mb-3">
                @foreach ($testingsRow as $testing)
                    <div class="col-lg mb-lg-0 mb-4">
                        <div class="view overlay rounded z-depth-3 mb-4">
                            <img class="img-fluid w-100" src="{{ $testing->image }}">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <h4 class="font-weight-bold mb-3"><strong>{{ $testing->name }}</strong></h4>
                        <p>by <a class="font-weight-bold">{{ $testing->user->name }}</a>, {{ $testing->created_at->diffForhumans() }}</p>
                        <p class="dark-grey-text">{{ Str::limit($testing->description, 70) }}</p>
                        <a class="btn btn-blue text-white" href="/testings/{{ $testing->id }}">View</a>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{ $testings->links()}}

    </div>

    @can('create', App\testing::class)
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating green" href="/testings/create">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endcan

@endsection
