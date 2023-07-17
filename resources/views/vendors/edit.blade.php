@extends('layouts.app')
@section('title', __('message.edit_vendor'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.edit_vendor') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('vendor.update', $vendor->id) }}">
            @method('patch')
            @csrf
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('message.name') }}</label>
                        <input value="{{ $vendor->name }}" type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="logo" class="form-label">{{ __('message.logo') }}</label>
                        <input value="{{ $vendor->logo }}" type="file" class="form-control" name="logo" id="logo"
                            aria-describedby="helpId" placeholder="logo">
                    </div>
                    <div>
                        @if (strstr($vendor->logo, 'http'))
                            <td><img width="100px" src="{{ $vendor->logo }}" class="img-fluid rounded-top" alt="">
                            </td>
                        @else
                            <td><img width="50px" src="{{ 'storage/' . $vendor->logo }}" class="img-fluid rounded-top"
                                    alt="">
                            </td>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center mt-4">
                    <div><button type="submit" class="btn btn-lg btn-primary">{{ __('message.save') }}</button></div>
                </div>
            </div>
        </form>
    </div>
@endsection
