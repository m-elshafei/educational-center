@extends('layouts.app')
@section('title', 'Course Students')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Course Students</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank"
                    href="{{ route('course_student.create') }}" role="button">Add New
                    Course Student</a></div>
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
                        <th scope="col">name</th>
                        <th scope="col">location</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($course_students as $key => $course_student)
                        <tr class="">
                            <td scope="row">{{ $key + $course_students->firstItem() }}</td>
                            <td>{{ $course_student->name }}</td>
                            <td>{{ $course_student->location }}</td>
                            <td>{{ $course_student->created_at }}</td>
                            <td>{{ $course_student->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('companies.delete', $course_student->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('companies.edit', $course_student->id) }}" role="button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $course_students->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $course_students->links() }}
        </div>

    </div>
@endsection
