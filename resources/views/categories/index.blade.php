@extends('layouts.app')
@section('title', 'categories')
@section('content')

    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Companies</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="" role="button">Add New
                    Company</a></div>
        </div>

        <div class="alert alert-success" role="alert">
            <strong></strong>
        </div>

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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="">
                        <td scope="row"></td>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a name="" id="" class="btn btn-warning" href="" role="button">
                                    <i class="fa-solid fa-code-branch fa-shake"></i>
                                </a>
                                <form action='' method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <a name="" id="" class="btn btn-primary" href=""
                                    role="button">cvxcvb
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <i class="fa-solid fa-house"></i>
                                <i class="fa-solid fa-house"></i>
                            </div>
                        </td>
                    </tr>

                    <tr class="">
                        <td colspan="6">No Data Found</td>
                    </tr>

                </tbody>
            </table>

        </div>

    </div>


@endsection
