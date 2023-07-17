@extends('layouts.app')
@section('title', __('message.edit_company'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.edit_company') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('company.update', $company->id) }}">
            @method('patch')
            @csrf
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('message.name') }}</label>
                        <input value="{{ $company->name }}" type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="{{ __('message.name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="owner" class="form-label">{{ __('message.owner') }}</label>
                        <input value="{{ $company->owner }}" type="text" class="form-control" name="owner"
                            id="owner" aria-describedby="helpId" placeholder="{{ __('message.owner') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tax_numebr" class="form-label">{{ __('message.tax_numebr') }}</label>
                        <input value="{{ $company->tax_number }}" type="text" class="form-control"
                            name="{{ __('message.tax_numebr') }}" id="tax_numebr" aria-describedby="helpId"
                            placeholder="Tax Number">
                    </div>
                </div>
                <x-button-save></x-button-save>
            </div>
        </form>
    </div>
@endsection
