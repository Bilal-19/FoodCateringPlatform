@section('main-section')
    @push('style')
        <style>
            i {
                height: 20px;
                width: 20px;
            }
        </style>
    @endpush
    @extends('layout.main')
    <div class="container-fluid">
        <div class="row mt-2 mb-2">
            <h3 class="text-center text-uppercase">Order History</h3>
        </div>

        <div class="row">
            @if (count($orderData) == 0)
                <div class="col-md-12">
                    <h4 class="text-center">You haven't place any order yet.</h4>
                </div>
            @elseif (count($orderData) > 0)
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Selected Event Category</th>
                            <th>Order Received Date</th>
                            <th>Total No of Guest</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                        </tr>

                        @foreach ($orderData as $value)
                            <tr>
                                <td>{{ $value->event_category }}</td>
                                <td>{{ $value->order_received_date }}</td>
                                <td>{{ $value->total_guest }}</td>
                                <td>{{ date_format($value->created_at, 'd-m-Y')}}</td>
                                <td>{{ $value->order_status == 'Packing' ? 'Delivered' : $value->order_status }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                {{-- @foreach ($orderData as $value)
                    <div class="col-md-4">
                        <div class="card m-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $value->event_category }}
                                </h5>
                                <p class="card-text mb-0"><i class="fa-solid fa-user"></i> {{ $value->customer_name }}</p>
                                <p class="card-text mb-0"><i class="fa-solid fa-envelope"></i> {{ $value->customer_email }}
                                </p>
                                <p class="card-text mb-0"><i class="fa-solid fa-spinner"></i> {{ $value->order_status }}
                                </p>
                                <p class="card-text mb-0"><i class="fa-regular fa-calendar-days"></i>
                                    {{ $value->order_received_date }} (Event date)</p>
                                <p class="card-text"><i class="fa-solid fa-users"></i> {{ $value->total_guest }} Guest</p>
                                <table class="table">
                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{ date_format($value->created_at, 'd-m-Y') }}</td>

                                    </tr>
                                    <tr>
                                        <th>Order Time</th>
                                        <td>{{ date_format($value->created_at, 'H:m') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            @endif
        </div>

    </div>
@endsection
