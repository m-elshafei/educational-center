@extends('layouts.app')
@section('title', 'Add New Employee')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Add New Employee</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('employee.store') }}">
            @csrf
            <div class="row border rounded m-2">
                             <div class="col-md-6">
                    <label for="formControlInput" class="form-label">job title</label>
                    <select  name="job_title" class="form-select" aria-label="Default select">
                        <option>Open this select menu</option>
                        @foreach ($job_titles as  $job_title)
                            <option value="{{ $job_title->job_title }}">{{ $job_title->job_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="salary" class="form-label">salary</label>
                        <input  type="text" class="form-control" name="salary"
                            id="salary" aria-describedby="helpId" placeholder="salary">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">hire date</label>
                        <input  type="date" class="form-control" name="hire_date"
                            id="hire_date" aria-describedby="helpId" placeholder="hire_date">
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
