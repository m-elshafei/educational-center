        @extends('layouts.app')
        @section('title', 'Edit Company')
        @section('content')
            <div class="rounded bg-white p-3 m-3">
                <h1 class="text-center">Edit Manager</h1>
                <form method="POST" action="{{ route('manager.update', $managers->id) }}">
                    @method('patch')
                    @csrf
                    <div class="row border rounded m-2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $managers->name }}" type="text" class="form-control" name="name"
                                    id="name" aria-describedby="helpId" placeholder="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="formControlInput" class="form-label">Company</label>


                            <select name="company_id" class="form-select" aria-label="Default select">
                                @if ($managers->company->id == null)
                                    <option required value="">Open this select menu</option>
                                @endif
                                <option value="{{ $managers->company->id }}">{{ $managers->company->name }}</option>
                                @foreach ($companies as $key => $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>


                            <div class="col-md-1">
                                <div class="d-flex justify-content-center mt-4">
                                    <div><button type="submit" class="btn btn-lg btn-primary">Save</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endsection
