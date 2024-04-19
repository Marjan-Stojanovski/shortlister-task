@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('persons.store') }}" method="post">
                @csrf
                <h4 style="padding-top: 20px; padding-bottom: 20px"> Add new person</h4>
                @if(Session::has('flash_message'))
                    <div id="flash-message" class="text-center">
                        <p class="alert alert-danger">{{ session('flash_message') }}</p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                               placeholder="Enter your full name">
                        @error('full_name')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               placeholder="example@test.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                               placeholder="0xx-xxx-xxx">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="date_of_birth" class="form-label">Date of birth</label>
                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
                               >
                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

