@extends('layouts.app')
@section('title', 'Companies')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Companies</h1>
        @if (Auth::check() && Auth::user())
            <div class="d-flex justify-content-end mb-3">
                <div><a name="" id="" class="btn btn-primary" target="_blank"
                        href="{{ route('company.create') }}" role="button">Add
                        New
                        Company</a></div>
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
                        <th scope="col">name</th>
                        <th scope="col">owner</th>
                        <th scope="col">tax numebr</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        @if (Auth::check() && Auth::user())
                            <th scope="col">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $key => $company)
                        <tr class="">
                            <td scope="row">{{ $key + $companies->firstitem() }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->owner }}</td>
                            <td>{{ $company->tax_number }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td>{{ $company->updated_at->diffForHumans() }}</td>
                            @if (Auth::check() && Auth::user())
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <a name="" id="" class="btn btn-warning"
                                            href="{{ route('branch.show', $company->id) }}" role="button">
                                            <i class="fa-solid fa-code-branch fa-shake"></i>
                                        </a>
                                        <form action="{{ route('company.destroy', $company->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('company.edit', $company->id) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                    </div>
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>

        {{ $companies->links() }}
    </div>

@endsection
