@extends('layouts.app')
@section('title', 'Edit Company')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Edit Company</h1>
        <form method="POST" action="{{ route('schedule.update',$schedule->id) }}">
            @method('patch')
            @csrf
            <div class="row border rounded m-2">
                 <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input value="{{ ($schedule->start_date) }}" type="date" class="form-control" name="start_date" id="start_date"
                            aria-describedby="helpId" placeholder="Start Date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input value="{{ ($schedule->end_date) }}" type="date" class="form-control" name="end_date"
                            id="end_date" aria-describedby="helpId" placeholder="End Date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input value="{{ ($schedule->start_time) }}" type="time" class="form-control" name="start_time"
                            id="start_time" aria-describedby="helpId" placeholder="Start Time">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_time" class="form-label">End Time</label>
                        <input value="{{ ($schedule->end_time) }}" type="time" class="form-control" name="end_time"
                            id="end_time" aria-describedby="helpId" placeholder="End Time">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="formControlInput" class="form-label">Course</label>
                    <select required name="course_id" class="form-select" aria-label="Default select">
                        <option value="{{ ($schedule->course_id) }}">{{ ($schedule->course->name) }}</option>
                        @foreach ($course as $key => $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="formControlInput" class="form-label">Class Room</label>
                    <select required name="class_room_id" class="form-select" aria-label="Default select">
                        <option value="{{  ($schedule->class_room->id) }}">{{ ($schedule->class_room->name) }}</option>
                        @foreach ($class as $key => $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="formControlInput" class="form-label">Instructor</label>
                    <select required name="instructor_id" class="form-select" aria-label="Default select">
                        <option value="{{ ($schedule->instructor->user->name) }}">{{ ($schedule->instructor->user->name) }}</option>
                        @foreach ($instructor as $key => $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
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
