@extends('layouts.app')
@section('title', __('message.add_new_course'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.add_new_course') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('course.store') }}">
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
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('message.price') }}</label>
                        <input value="{{ old('price') }}" type="text" class="form-control" name="price" id="price"
                            aria-describedby="helpId" placeholder="{{ __('message.price') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hours" class="form-label">{{ __('message.hours') }}</label>
                        <input value="{{ old('hours') }}" type="text" class="form-control" name="hours" id="hours"
                            aria-describedby="helpId" placeholder="{{ __('message.hours') }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="formControlInput" class="form-label">{{ __('message.vendor') }}</label>
                    <select required name="vendor_id" class="form-select" aria-label="Default select">
                        <option value="{{ old('vendor_id') }}">{{ __('message.open_this') }}</option>
                        @foreach ($vendors as $key => $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="formControlInput" class="form-label">{{ __('message.category') }}</label>
                    <select required name="category_id" class="form-select" aria-label="Default select">
                        <option value="{{ old('category_id') }}">{{ __('message.open_this') }}</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">{{ __('message.save') }}</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
