@extends('layouts.app')
@section('title', __('message.add_new_company'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <x-title title="add_new_company" />
@include('layouts.errorMessage')
        <form method="POST" action={{ route('company.store') }}>
            @csrf
            <div class="row border rounded m-2">
                <x-input label='name' type='text' />
                <x-input label='owner' type='text' />
                <x-input label='tax_numebr' type='text' />
                <x-button name='save' />
            </div>
        </form>
    </div>
@endsection
