@extends('layouts.app')
@section('title', __('message.add_new_category'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.add_new_category') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('message.name') }}</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="{{ __('message.name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">{{ __('message.save') }}</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
