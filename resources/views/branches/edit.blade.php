@extends('layouts.app')
@section('title', 'Edit branch')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Edit branch</h1>
        <form method="POST" action="{{ route('branch.update', $branch->id) }}">
            @method('patch')
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $branch->name }}" type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" class="form-label">location</label>
                        <input value="{{ $branch->location }}" type="text" class="form-control" name="location"
                            id="location" aria-describedby="helpId" placeholder="location">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Company</label>
                        <input value="{{ $branch->company_id }}" type="text" class="form-control" name="company_id"
                            id="company_id" aria-describedby="helpId" placeholder="Company">
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
