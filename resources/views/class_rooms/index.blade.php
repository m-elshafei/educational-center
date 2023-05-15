@extends('layouts.app')
@section('title', __('message.class_rooms'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.class_rooms') }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('classroom.create') }}"
                    role="button">{{ __('message.add_new_class') }}</a></div>
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
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col" style="width: 30%">{{ __('message.information') }}</th>
                        <th scope="col">{{ __('message.capacity') }}</th>
                        <th scope="col">{{ __('message.branch') }}</th>
                        <th scope="col">{{ __('message.created_at') }}</th>
                        <th scope="col">{{ __('message.updated_at') }}</th>
                        <th scope="col">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($class_rooms as $key => $class_room)
                        <tr class="">
                            <td scope="row">{{ $key + $class_rooms->firstItem() }}</td>
                            <td>{{ $class_room->name }}</td>
                            @if ($class_room->configration)
                                <td>{{ $class_room->configration }}</td>
                            @else
                                <td>{{ 'No configration' }}</td>
                            @endif
                            <td>{{ $class_room->capacity }}</td>
                            <td>{{ $class_room->branch->name }}</td>
                            <td>{{ $class_room->created_at }}</td>
                            <td>{{ $class_room->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('classroom.destroy', $class_room->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('classroom.edit', $class_room->id) }}" role="button">
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
            {{ $class_rooms->links() }}
        </div>

    </div>
@endsection
