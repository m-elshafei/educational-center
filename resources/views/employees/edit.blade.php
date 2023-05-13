@extends('layouts.app')
@section('title', 'Edit Employees')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Edit Employees</h1>
        <form method="POST" action="{{ route('employee.update',$employees->id) }}">
            @method('patch')
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                  <div class="col-md-6">
                    <label for="formControlInput" class="form-label">job title</label>
                    <select  name="job_title" class="form-select" aria-label="Default select">
                        {{-- @if ($employees->job_title == null)
                            <option required value="">Open this select menu</option>
                        @endif --}}
                        <option value="{{$employees->job_title }}">{{ $employees->job_title }}</option>
                        @foreach ($job_titles as  $job_title)
                            <option value="{{ $job_title->job_title }}">{{ $job_title->job_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="salary" class="form-label">salary</label>
                        <input value="{{ $employees->salary }}" type="text" class="form-control" name="salary"
                            id="salary" aria-describedby="helpId" placeholder="salary">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">hire date</label>
                        <input value="{{ $employees->hire_date }}" type="date" class="form-control" name="hire_date"
                            id="hire_date" aria-describedby="helpId" placeholder="hire_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="user_id " class="form-label">user </label>
                        <input value="{{ $employees->user->name }}" type="text" class="form-control" name="user_id"
                            id="user_id " aria-describedby="helpId" placeholder="user_id ">
                    </div>
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
