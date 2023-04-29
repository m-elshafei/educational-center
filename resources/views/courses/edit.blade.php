@extends('layouts.app')
@section('title', 'Edit Course')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Edit Course</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('course.update', $courses->id) }}">
            @method('patch')
            @csrf
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $courses->name }}" type="text" class="form-control" name="name"
                            id="name" aria-describedby="helpId" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input value="{{ $courses->price }}" type="text" class="form-control" name="price"
                            id="price" aria-describedby="helpId" placeholder="Price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hours" class="form-label">Hours</label>
                        <input value="{{ $courses->hours }}" type="number" class="form-control" name="hours"
                            id="hours" aria-describedby="helpId" placeholder="Hours">
                    </div>
                </div>
                <div class="col-6">
                    <label for="formControlInput" class="form-label">Vendor</label>
                    <select required name="vendor_id" class="form-select" aria-label="Default select">
                        <option value="{{ $courses->vendor->name }}">{{ $courses->vendor->name }}</option>
                        @foreach ($vendors as $key => $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="formControlInput" class="form-label">Category</label>
                    <select required name="category_id" class="form-select" aria-label="Default select">
                        <option value="{{ $courses->category->name }}">{{ $courses->category->name }}</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">Save</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
