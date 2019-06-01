@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Create a project</strong>
        </h5>
        <div class="card-body px-lg-5 pt-0">
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="text-center" method="POST" action="/projects">
                @csrf
                <div class="md-form">
                    <input type="text" name="name" id="materialRegisterFormName" class="form-control">
                    <label for="materialRegisterFormName">Name</label>
                </div>
                <div class="md-form">
                    <input type="text" name="image" id="materialRegisterFormImageUrl" class="form-control">
                    <label for="materialRegisterFormTitle">Image Url</label>
                </div>
                <div class="md-form">
                    <textarea id="materialContactFormDescription" name="description" class="form-control md-textarea" rows="3"></textarea>
                    <label for="materialContactFormDescription">Description</label>
                </div>
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
