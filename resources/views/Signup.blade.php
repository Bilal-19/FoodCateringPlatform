@extends('layout.main')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-2 mb-2">
            <h3 class="text-center text-uppercase">Signup</h3>
        </div>

        <div class="row">
            <form action="{{ route('newUserAccount') }}" method="post">
                @csrf
                <div class="col-md-4 mx-auto">
                    <label for="name" class="form-label mb-0">Name: </label>
                    <input type="text" class="form-control" name="userName">
                    <small class="text-danger">
                        @error('userName')
                            {{ 'The name field is required' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <label for="email" class="form-label mb-0">Email: </label>
                    <input type="email" class="form-control" name="userEmail">
                    <small class="text-danger">
                        @error('userEmail')
                            {{ 'The email field is required' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <label for="password" class="form-label mb-0">Password: </label>
                    <input type="password" class="form-control" name="userPassword">
                    <small class="text-danger">
                        @error('userPassword')
                            {{ 'The password field is required' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <button class="btn btn-outline-dark">Signup</button>
                </div>

                <div class="col-md-4 mx-auto mt-3">
                    <p>Already have an account?
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-dark">Log In</a>
                    </p>
                </div>

            </form>
        </div>


    </div>
@endsection
