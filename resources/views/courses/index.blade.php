@extends('layouts.app')
@section('title', __('message.courses'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{  __('message.courses') }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('course.create') }}"
                    role="button">{{  __('message.add_new_course') }}</a></div>
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
                        <th scope="col">{{  __('message.name') }}</th>
                        <th scope="col">{{  __('message.price') }}</th>
                        <th scope="col">{{  __('message.hours') }}</th>
                        <th scope="col">{{  __('message.category') }}</th>
                        <th scope="col">{{  __('message.vendor') }}</th>
                        <th scope="col">{{  __('message.created_at') }}</th>
                        <th scope="col">{{  __('message.updated_at') }}</th>
                        <th scope="col">{{  __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $key => $course)
                        <tr class="">
                            <td scope="row">{{ $key + $courses->firstItem() }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->price }}</td>
                            <td>{{ $course->hours }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>{{ $course->vendor->name }}</td>
                            <td>{{ $course->created_at }}</td>
                            <td>{{ $course->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('course.destroy', $course->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('course.edit', $course->id) }}" role="button">
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
            {{-- {{ $courses->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $courses->links() }}
        </div>

    </div>
@endsection
