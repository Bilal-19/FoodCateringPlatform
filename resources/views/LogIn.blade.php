@extends('layout.main')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-2 mb-2">
            <h3 class="text-center text-uppercase">Login</h3>
        </div>

        <div class="row">
            <form action="{{ route('verifyCredentials') }}" method="post">
                @csrf

                <div class="col-md-4 mx-auto mt-3">
                    <label for="email" class="form-label mb-0">Email: </label>
                    <input type="email" class="form-control" name="email">
                    <small class="text-danger">
                        @error('userEmail')
                            {{ 'The email field is required' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <label for="password" class="form-label mb-0">Password: </label>
                    <input type="password" class="form-control" name="password">
                    <small class="text-danger">
                        @error('userPassword')
                            {{ 'The password field is required' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <button class="btn btn-outline-dark">Login</button>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <p>Create a new account? <a href="{{ route('SignUp') }}"
                            class="text-decoration-none fw-bold text-dark">Sign Up</a></p>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    @isset($errorMessage)
                        <p class="text-danger">{{ $errorMessage }}</p>
                    @endisset
                </div>
            </form>
        </div>


    </div>
@endsection
