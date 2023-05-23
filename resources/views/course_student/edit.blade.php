@extends('layouts.app')
@section('title',  __('message.edit_course_students'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.edit_course_students') }}</h1>
        <form method="POST" action="{{ route('course_student.update', $courses->id) }}">
            @method('patch')
            @csrf
            <div>
                <div class="row border rounded m-2">
                    <div class="col-md-6 ">
                        <div class="mb-4">
                            <label for="owner" class="form-label">{{ __('message.student') }}</label>
                            <input type="text" value="{{ $courses->student->name }}" class="form-control" name="owner"
                                id="owner" aria-describedby="helpId" placeholder="{{ __('message.student') }}">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div><button type="submit" class="btn btn-lg btn-primary">{{ __('message.save') }}</button></div>
                </div>

            </div>
        </form>
    </div>
@endsection
