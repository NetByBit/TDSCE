@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Create an idea</strong>
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
            <form class="text-center" method="POST" action="/ideas" enctype="multipart/form-data">
                @csrf
                <div class="md-form">
                    <input type="text" name="name" id="materialRegisterFormName" class="form-control">
                    <label for="materialRegisterFormName">Name</label>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
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
