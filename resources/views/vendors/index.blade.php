@extends('layouts.app')
@section('title', __('message.vendors'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.vendors') }} </h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" href="{{ route('vendor.create') }}" role="button">{{__('message.add_new_vendor') }}</a></div>
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
                        <th scope="col">{{__('message.name') }}</th>
                        <th scope="col">{{__('message.logo') }}</th>
                        <th scope="col">{{__('message.download').' / '.__('message.open') }}</th>
                        <th scope="col">{{__('message.created_at') }}</th>
                        <th scope="col">{{__('message.updated_at') }}</th>
                        <th scope="col">{{__('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vendors as $key => $vendor)
                        <tr class="">
                            <td scope="row">{{ $key + $vendors->firstItem() }}</td>
                            <td>{{ $vendor->name }}</td>
                            @if (strstr($vendor->logo, 'http'))
                                <td><img width="50px" src="{{ $vendor->logo }}" class="img-fluid rounded-top"
                                        alt="">
                                </td>
                                <td><a href="{{ $vendor->logo }}">{{__('message.open') }} </a><br>
                                    <a download href="{{ asset($vendor->logo) }}">{{__('message.download') }}</a>
                                </td>
                            @else
                                <td><img width="50px" src="{{ 'storage/' . $vendor->logo }}" class="img-fluid rounded-top"
                                        alt="">
                                </td>
                                <td><a href="{{ 'storage/' . $vendor->logo }}">{{__('message.open') }} </a><br>
                                    <a download href="{{ asset('storage/' . $vendor->logo) }}">{{__('message.download') }} </a>
                                </td>
                            @endif
                            <td>{{ $vendor->created_at }}</td>
                            <td>{{ $vendor->updated_at->diffforhumans () }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('vendor.edit',$vendor->id) }}" role="button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">{{__('message.vendors') }}No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $vendors->links() }}
        </div>

    </div>
@endsection
