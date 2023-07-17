@extends('layouts.app')
@section('title', __('message.add_new_branch'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.add_new_branch') }}</h1>
        @include('layouts.errorMessage')
        <form method="POST" action="{{ route('branch.store') }}">
            @csrf
            <div class="row border rounded m-2">
                <x-input label='name' type='text' />
                <x-input label='location' type='text' />
                <div class="row mb-2">
                    {{-- <div class="col-6">
                        <label for="formControlInput" class="form-label">{{ __('message.company') }}</label>
                        <select name="company_id" class="form-select" aria-label="Default select">
                            <option value="{{ old('company_id') }}">Open this select menu</option>
                            @foreach ($companies as $key => $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <x-foreach name="company_id" value="company_id" compact="$companies" key="$key" valueFor="$company"
                        ValueId="$company->id" ValueName="$company->name" />
                    <x-button name='save' />
                </div>
            </div>
        </form>
        {{-- <form method="POST" action={{ route('branch.store') }}>
            @csrf
            <div class="row border rounded m-2">
                <x-input label='name' type='text' />
                <x-input label='location' type='text' />
                <x-input label='company_id' type='text' />
                <x-button name='save' />
            </div>
        </form> --}}

    </div>
@endsection
