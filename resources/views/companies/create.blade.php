@extends('layouts.app')
@section('title', __('message.add_new_company'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{  __('message.add_new_company') }}</h1>
        <form method="POST" action={{ route('company.store') }}>

            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('message.name') }}</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="{{ __('message.name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="owner" class="form-label">{{ __('message.owner') }}</label>
                        <input type="text" class="form-control" name="owner" id="owner" aria-describedby="helpId"
                            placeholder="{{ __('message.owner') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tax_numebr" class="form-label">{{ __('message.tax_numebr') }}</label>
                        <input type="text" class="form-control" name="tax_number" id="tax_numebr"
                            aria-describedby="helpId" placeholder="{{ __('message.tax_numebr') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">{{ __('message.save') }}</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
