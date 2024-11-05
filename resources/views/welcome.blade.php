@extends('layout.main')
@push('style')
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1513623935135-c896b59073c1?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-6 mx-auto mt-5 bg-dark text-light">
                <h1 class="text-center">Take Away & Delivery</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-2 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-mug-saucer"></i> Breakfast</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $breakfastCount }} Dishes</p>
                </div>
            </div>

            <div class="col-md-2 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-utensils"></i> Lunch</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $lunchCount }} Dishes</p>
                </div>
            </div>

            <div class="col-md-2 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-bowl-rice"></i> Dinner</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $dinnerCount }} Dishes</p>
                </div>
            </div>


            <div class="col-md-2 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-hand-holding-heart"></i> Wedding</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $weddingCount }} Dishes</p>
                </div>
            </div>
            <div class="col-md-3 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-cake-candles"></i> Birthday Party</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $birthdayPartyCount }} Dishes</p>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-3 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-building"></i> Corporate Event</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $corporateCount }} Dishes</p>
                </div>
            </div>
            <div class="col-md-3 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-people-roof"></i> Family Get Together</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $familyGetTogetherCount }} Dishes</p>
                </div>
            </div>

            <div class="col-md-3 text-center mx-auto mt-4">
                <div class="card bg-dark text-light">
                    <h4 class="card-title pt-2"><i class="fa-solid fa-champagne-glasses"></i> Holiday Parties</h4>
                    <p><i class="fa-solid fa-circle-check" style="color: #20c70a;"></i> {{ $holidayPartiesCount }} Dishes</p>
                </div>
            </div>
        </div>

    </div>
@endsection
