@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-4">
            <div class="view overlay rounded z-depth-3">
                <img class="img-fluid" src="{{ $idea->image }}">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <h3 class="h2-responsive font-weight-bold mb-5">{{ $idea->name }}</h3>
            <p>{{ $idea->description }}</p>
        </div>
    </div>

    @component('components.comments', ['comments' => $idea->comments])
    @endcomponent

</div>
@endsection
