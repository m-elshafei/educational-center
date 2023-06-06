@extends('layouts.app')
@section('title', __('message.schedules'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.schedules') }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('schedule.create') }}"
                    role="button">{{ __('message.add_new_schedule') }}</a></div>
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
                        <th scope="col">{{ __('message.start_date') }}</th>
                        <th scope="col">{{ __('message.end_date') }}</th>
                        <th scope="col">{{ __('message.start_time') }}</th>
                        <th scope="col">{{ __('message.end_time') }}</th>
                        <th scope="col">{{ __('message.course') }}</th>
                        <th scope="col">{{ __('message.class_room') }}</th>
                        <th scope="col">{{ __('message.instructor') }}</th>
                        <th scope="col">{{ __('message.created_by') }}</th>
                        <th scope="col">{{ __('message.created_at') }}</th>
                        <th scope="col">{{ __('message.updated_at') }}</th>
                        <th scope="col">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $key=>  $schedule)
                        <tr class="">
                            <td scope="row">{{ $key + $schedules->firstItem() }}</td>
                            <td>{{ $schedule->start_date }}</td>
                            <td>{{ $schedule->end_date }}</td>
                            <td>{{ $schedule->start_time }}</td>
                            <td>{{ $schedule->end_time }}</td>
                            <td>{{ $schedule->course->name }}</td>
                            <td>{{ $schedule->class_room->name }}</td>
                            <td>{{$schedule->instructor->user->name}}</td>
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
                            <td colspan="6">{{ __('message.no_data_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $schedules->links() }}
        </div>
    </div>
@endsection
