@extends('layouts.app')
@section('title',__('message.contact_us'))
@section('content')
    <body class="text-center ">
        <main class="form-signin">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <form method="post" action="{{ route('contact.store') }}">
                @csrf
                <img class="mb-4" src="{{ asset('text-messages-not-sending-768x432.jpeg') }}" alt="" width="72"
                    height="57">
                <h1 class="h3 mb-3 fw-normal">{{ __('message.write_message') }}</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                    <label for="floatingInput">{{ __('message.name') }}</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
                    <label for="floatingInput">{{ __('message.email') }}</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                    <label for="floatingInput">{{ __('message.subject') }}</label>
                </div>
                <div>
                    <textarea name="message" class="form-control" id="message" placeholder="{{ __('message.message') }}"></textarea>
                </div>
                <div>
                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">{{ __('message.send') }}</button>
                </div>
            </form>
        </main>
    </body>
@endsection
