@extends('layouts.app')
@section('title', __('message.add_new_class'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.add_new_class') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('classroom.store') }}">
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
                        <label for="configration" class="form-label">{{ __('message.information') }}</label>
                        <input value="{{ old('configration') }}" type="text" class="form-control" name="configration"
                            id="configration" aria-describedby="helpId" placeholder="{{ __('message.information') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="capacity" class="form-label">{{ __('message.capacity') }}</label>
                        <input value="{{ old('capacity') }}" type="text" class="form-control" name="capacity"
                            id="capacity" aria-describedby="helpId" placeholder="{{ __('message.capacity') }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="formControlInput" class="form-label">{{ __('message.branch') }}</label>
                    <select name="branch_id" class="form-select" aria-label="Default select">
                        <option value="{{ old('branch_id') }}">{{ __('message.open_this') }}</option>
                        @foreach ($branches as $key => $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
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
