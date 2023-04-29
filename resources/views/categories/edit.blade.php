@extends('layouts.app')
@section('title', 'Add New Category')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Edit Category</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('category.update', $categories->id) }}">
            @method('patch')
            @csrf
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input required value="{{ $categories->name }} " type="text" class="form-control" name="name"
                            id="name" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">Save</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
