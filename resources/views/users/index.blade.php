@extends('layouts.app')
@section('title', __('message.data'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.data') }}</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="GET" action="{{ route('company.index') }}">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="search" id="search" aria-describedby="helpId"
                            placeholder="Search By Name">
                    </div>
                </form>
            </div>
        </div>
        @if (Auth::check() && Auth::user())
            <div class="d-flex justify-content-end mb-3">
                <div><a name="" id="" class="btn btn-primary" target="_blank"
                        href="{{ route('company.create') }}" role="button">{{ __('message.add_company') }}</a>
                </div>
            </div>
        @endif
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
                        <th scope="col">{{ __('message.owner') }}</th>
                        <th scope="col">{{ __('message.tax_numebr') }}</th>
                        <th scope="col">{{ __('message.created_at') }}</th>
                        <th scope="col">{{ __('message.updated_at') }}</th>
                        @if (Auth::check() && Auth::user())
                            <th scope="col">{{ __('message.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $value)
                        <tr class="">
                            <td scope="row">{{ $key + $data->firstitem() }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->name_ar }}</td>
                            <td>{{ $value->email  }}</td>
                            <td>{{ $value->role  }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>{{ $value->updated_at->diffForHumans() }}</td>
                            @if (Auth::check() && Auth::user())
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <a name="" id="" class="btn btn-warning"
                                            href="{{ route('branch.show', $value->id) }}" role="button">
                                            <i class="fa-solid fa-code-branch fa-shake"></i>
                                        </a>
                                        <form action="{{ route('company.destroy', $value->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('company.edit', $value->id) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                    </div>
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">{{ __('message.no_data_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>

        {{ $data->links() }}
    </div>

@endsection
