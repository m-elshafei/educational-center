@extends('layouts.app')
@section('title',  __('message.course_students'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{  __('message.course_students') }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div>
                <a name="" id="" class="btn btn-primary" target="_blank"
                    href="{{ route('course_student.create') }}" role="button">{{  __('message.add_new_course_students') }}
                </a>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{  __('message.student') }}</th>
                        <th scope="col">{{  __('message.created_by') }}</th>
                        <th scope="col">{{  __('message.created_at') }}</th>
                        <th scope="col">{{  __('message.updated_at') }}</th>
                        <th scope="col">{{  __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($course_students as $key => $course_student)
                        <tr class="">
                            <td scope="row">{{ $key + $course_students->firstItem() }}</td>
                            <td>{{ $course_student->student->name }}</td>
                            <td>{{ $course_student->user->name }}</td>
                            <td>{{ $course_student->created_at }}</td>
                            <td>{{ $course_student->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('course_student.destroy', $course_student->id) }}'
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('course_student.edit', $course_student->id) }}" role="button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">{{  __('message.no_data_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $course_students->links() }}
        </div>

    </div>
@endsection
