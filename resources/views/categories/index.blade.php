@extends('../layouts.app')
@section('title', 'categories')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">categorieses</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ url('categories.create') }}"
                    role="button">Add New
                    categories</a></div>
        </div>
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">crated_at</th>
                        <th scope="col">updated_at</th>

                        <th scope="col" colspan="4">Action</th>
                    </tr>
                </thead>
                @forelse ($categories as $key => $category)
                    <tbody>
                        <tr class="">
                            <td scope="row">{{ $key + $categories->firstitem() }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>

                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='' method="post">
                                        @csrf

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary" href="" role="button">
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
            {{ $categories->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
