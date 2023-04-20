@extends('layouts.app')
@section('title', 'Add New category')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Add New Category</h1>
        <form method="POST" action="">
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="category_id" class="form-label">Main Category</label>
                        <select class="form-select form-select-3g" name="category_id" id="category_id">
                            <option value="" selected>Select one</option>
                            @foreach ($categories as $key => $category)
                                <option value=''>{{ $category->name }}</option>";
                            @endforeach

                        </select>
                    </div>
                </div>
                {{-- <label for="category" class="form-label col-md-6">Category</label>
                <select class=" col-md-2" name="category_id" id="category_id">
                    <option value="" selected>Select one</option>
                    <option value=''></option>";
                </select> --}}

                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="tax_numebr" aria-describedby="helpId"
                            placeholder="Name Category">
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">Save</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
