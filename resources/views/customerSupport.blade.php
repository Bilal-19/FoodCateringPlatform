@extends('layout.main')
@push('style')
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1544027993-37dbfe43562a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-repeat: no-repeat;
        }

        .fa-icon {
            height: 20px;
            width: 18px;
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-4 mx-auto text-center">
                <h3 class="text-uppercase p-2">Customer Support</h3>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="card bg-light text-dark p-3">
                    <h5 class="p-2 text-center">Contact Information</h5>
                    <p class="mb-0 card-text"><i class="fa-icon fa-solid fa-phone"></i> 03082491543</p>
                    <p class="mb-0 card-text"><i class="fa-icon fa-solid fa-envelope"></i> info@catering.com</p>
                    <p class="mb-0 card-text"><i class="fa-icon fa-solid fa-location-dot"></i> Karachi, Pakistan</p>
                    <p class="mb-2 card-text"><i class="fa-icon fa-solid fa-clock"></i> 9am - 6pm</p>
                </div>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-5">
                <div class="card bg-light text-dark pt-2 pb-3">
                    <h5 class="text-center">Contact Us</h5>
                    <form action="{{ route('customerInquiry') }}" method="post">
                        @csrf
                        <div class="col-md-8 mx-auto">
                            <label for="user_name" class="form-label mb-0">Name: </label>
                            <input type="text" class="form-control" name="user_name">
                            <small class="text-danger">
                                @error('user_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-8 mx-auto">
                            <label for="useremail" class="form-label mb-0 mt-2">Email: </label>
                            <input type="email" class="form-control" name="user_email">
                            <small class="text-danger">
                                @error('user_email')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-8 mx-auto">
                            <label for="usermessage" class="form-label mb-0 mt-2">Message: </label>
                            <textarea name="user_message" cols="30" rows="5" class="form-control" style="resize: none;"></textarea>
                            <small class="text-danger">
                                @error('user_message')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-8 mx-auto">
                            <button class="btn btn-outline-dark mt-3">Submit</button>
                        </div>

                        @isset($message)
                            <p class="{{$style}} text-center">{{ $message }}</p>
                        @endisset
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
