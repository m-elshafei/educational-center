@extends('layouts.app')
@section('title', 'Employees')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Employees</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank"
                    href="{{ route('employee.create') }}" role="button">Add New
                    Employee</a></div>
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
                        <th scope="col">job title</th>
                        <th scope="col">salary</th>
                        <th scope="col">hire date</th>
                        <th scope="col">user </th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $key => $employee)
                        <tr class="">
                            <td scope="row">{{ $key + $employees->firstItem() }}</td>
                            <td>{{ $employee->job_title }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->hire_date }}</td>
                            <td>{{ $employee->user->name  }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('employee.destroy', $employee->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('employee.edit', $employee->id) }}" role="button">
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
            {{-- {{ $employees->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $employees->links() }}
        </div>

    </div>
@endsection
