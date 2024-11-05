@extends('layout.main')
@push('style')
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1662982696492-057328dce48b?q=80&w=1437&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-6 bg-light rounded mx-auto">
                <form action="{{ route('placeOrder') }}" class="form p-2" method="POST">
                    @csrf
                    <h4 class="text-center">Order Now</h4>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="name" class="form-label mb-0">Name: </label>
                            <input type="text" class="form-control" name="username">
                            <small class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="event" class="form-label mb-0">Select Event: </label>
                            <select name="event" class="form-select">
                                @php
                                    $eventCategories = [
                                        'Breakfast',
                                        'Lunch',
                                        'Dinner',
                                        'Wedding',
                                        'Birthday Party',
                                        'Corporate Events',
                                        'Family Get Together',
                                        'Holiday Parties',
                                    ];
                                @endphp
                                @foreach ($eventCategories as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>

                            <small class="text-danger">
                                @error('event')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        {{-- <div class="col-md-6 mt-2">
                            <label for="email" class="form-label mb-0">Email: </label>
                            <input type="email" class="form-control" name="useremail" value="{{ Auth::user()->email }}">
                            <small class="text-danger">
                                @error('useremail')
                                    {{ 'Please enter email address' }}
                                @enderror
                            </small>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="date" class="form-label mb-0">Select Order Received Date: </label>
                            <input type="date" class="form-control" name="order_date">
                            <small class="text-danger">
                                @error('order_date')
                                    {{ 'Please enter order received date' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="totalPeople" class="form-label mb-0">Total People to Serve Food? </label>
                            <select name="totalPeople" class="form-select">
                                <option value="500">500</option>
                                <option value="500-1000">500-1000</option>
                                <option value="1000-2000">1000-2000</option>
                            </select>
                            <small class="text-danger">
                                @error('totalPeople')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>



                    <div class="col-md-12 mt-2">
                        <label for="comments" class="form-label mb-0">Comments: </label>
                        <textarea name="message" cols="30" rows="5" class="form-control" style="resize: none"></textarea>

                        <small class="text-danger">
                            @error('message')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-12 mt-2 mb-3">
                        <button type="submit" class="btn btn-outline-dark mt-2"><i class="fa-regular fa-paper-plane"></i>
                            Place Order</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
