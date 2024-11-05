@section('main-section')
    @push('style')
        <style>
            .card {
                height: 330px;
                width: 300px;
                margin: 10px;
            }

            .card-img {
                height: 240px;
                width: 298px;
                object-fit: cover;
            }
        </style>
    @endpush
    @extends('layout.main')
    <div class="container-fluid">
        <div class="row mt-5 mb-2">
            <h3 class="text-center text-uppercase">Browse Menu</h3>
        </div>

        <div class="row">
            <form action="{{ route('menuData') }}" method="get">
                <div class="input-group">
                    <select name="selectCategory" class="form-select">
                        @php
                            $itemCategories = [
                                'All Menu Items',
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
                        @php
                            $category = $search ?? '';
                        @endphp
                        @foreach ($itemCategories as $val)
                            <option value="{{ $val }}" {{ $val == $category ? 'selected' : '' }}>
                                {{ $val }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-success">Search</button>
                </div>
            </form>
        </div>

        <div class="row">
            <p>
                {{ count($menu) }} records found
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex flex-wrap justify-content-start">
                @foreach ($menu as $val)
                    <div class="card shadow mx-2">
                        <img src="{{ asset('images/' . $val->item_image) }}" alt="" class="card-img-top card-img">
                        <div class="card-body">
                            <h4 class="card-label">{{ $val->item_label }}</h4>
                            <p class="card-text mb-0">Price: {{ $val->item_price }} PKR</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
