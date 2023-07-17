@extends('layouts.app')
@section('title', __('message.edit_employee'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.edit_employee') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('employee.update', $employees->id) }}">
            @method('patch')
            @csrf
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <label for="formControlInput" class="form-label">{{ __('message.job_title') }}</label>
                    <select name="job_title" class="form-select" aria-label="Default select">
                        <option value="{{ $employees->job_title }}">{{ $employees->job_title }}</option>
                        @foreach ($job_titles as $job_title)
                            <option value="{{ $job_title->job_title }}">{{ $job_title->job_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="salary" class="form-label">{{ __('message.salary') }}</label>
                        <input value="{{ $employees->salary }}" type="text" class="form-control" name="salary"
                            id="salary" aria-describedby="helpId" placeholder="{{ __('message.salary') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">{{ __('message.hire_date') }}</label>
                        <input value="{{ $employees->hire_date }}" type="date" class="form-control" name="hire_date"
                            id="hire_date" aria-describedby="helpId" placeholder="{{ __('message.hire_date') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="user_id " class="form-label">{{ __('message.name') }}</label>
                        <input value="{{ $employees->user->name }}" type="text" class="form-control" name="user_id"
                            id="user_id " aria-describedby="helpId" placeholder="{{ __('message.name') }} ">
                    </div>
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
