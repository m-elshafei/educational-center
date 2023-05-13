@extends('layouts.app')
@section('title', 'Schedules')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Schedules</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('schedule.create') }}"
                    role="button">Add New
                    schedule</a></div>
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
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Course</th>
                        <th scope="col">Class Room</th>
                        <th scope="col">Instructor</th>
                        <th scope="col">Created By </th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $key=>  $schedule)
                                {{-- <td>{{ $schedule->instructor->user->name }}</td> --}}
                        {{-- @dd( $schedule->instructor->user->name) --}}
                        {{-- @dd($schedule->instructor->user->id) --}}
                        <tr class="">
                            <td scope="row">{{ $key + $schedules->firstItem() }}</td>
                            <td>{{ $schedule->start_date }}</td>
                            <td>{{ $schedule->end_date }}</td>
                            <td>{{ $schedule->start_time }}</td>
                            <td>{{ $schedule->end_time }}</td>
                            <td>{{ $schedule->course->name }}</td>
                            <td>{{ $schedule->class_room->name }}</td>
                            {{-- @foreach ($assa as $value)
                                @break
                             @endforeach --}}
                            {{-- <td>{{ $value}}</td> --}}
                            {{-- <td>{{ $schedule->instructor->name }}</td> --}}
                            {{-- <td>{{$schedule->instructor->user->name }}</td> --}}
                            {{-- @dd($schedule->instructor->user->name) --}}
                            <td>{{ $schedule->user->name }}</td>
                            <td>{{ $schedule->created_at }}</td>
                            <td>{{ $schedule->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('schedule.destroy', $schedule->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('schedule.edit', $schedule->id) }}" role="button">
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
            {{ $schedules->links() }}
        </div>

    </div>
@endsection
