@extends('layout.main')
@push('style')
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1535813547-99c456a41d4a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHF1ZXN0aW9uc3xlbnwwfHwwfHx8MA%3D%3D');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <h5 class="text-center text-light">FREQUENTLY ASKED QUESTIONS</h5>
                @foreach ($faq as $value)
                    <div class="card mb-2">
                        <h5 class="card-header"><i class="fa-solid fa-circle-question"></i> {{ $value->question }}</h5>
                        <div class="card-body">
                            <p class="card-text"><i class="fa-solid fa-comment"></i> {{ $value->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
