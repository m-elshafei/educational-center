@extends('layouts.app')
@section('title', __('message.add_new_manager'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.add_new_manager') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('manager.store') }}">
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
                    <label for="formControlInput" class="form-label">{{ __('message.company') }}</label>
                    <select required name="company_id" class="form-select" aria-label="Default select">
                        <option value="{{ old('company_id') }}">{{ __('message.open_this') }}</option>
                        @foreach ($companies as $key => $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-center mt-4 ">
                    <div><button type="submit" class="btn btn-lg btn-primary">{{ __('message.save') }}</button></div>
                </div>
            </div>
        </form>
    </div>
@endsection
