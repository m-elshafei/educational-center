        {{-- @dd($company->id) --}}
        @extends('layouts.app')
        @section('title', 'Edit Company')
        @section('content')
            <div class="rounded bg-white p-3 m-3">
                <h1 class="text-center">Edit Manager</h1>
                <form method="POST" action="{{ route('manager.update', $managers->id) }}">
                    @method('patch')
                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    <div class="row border rounded m-2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $companies->name }}" type="text" class="form-control" name="name"
                                    id="name" aria-describedby="helpId" placeholder="name">
                            </div>
                            {{--  @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                        </div>
                        <div class="col-md-6">


                            <label for="formControlInput" class="form-label">Company</label>
                            <select required name="company_id" class="form-select" aria-label="Default select">
                                <option value="{{ $companies->id }}">Open this select menu</option>
                                @foreach ($companies as $key => $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center mt-4">
                                <div><button type="submit" class="btn btn-lg btn-primary">Save</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endsection
