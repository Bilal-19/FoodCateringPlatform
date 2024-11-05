@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Order Management</h2>
        </div>

        <div class="row">
            <form action="{{ route('manage_order') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" autocomplete="off"
                        placeholder="Search by customer name, order status">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="row mt-3">
            @if (count($orders) == 1)
                <p>{{ count($orders) }} record found</p>
            @elseif (count($orders) > 1)
                <p>{{ count($orders) }} records found</p>
            @elseif (count($orders) == 0)
                <p>No record found</p>
            @endif
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <th>Selected Event</th>
                        <th>Order Status</th>
                        <th>Update Order Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($orders as $value)
                        <tr>
                            <td>{{ $value->customer_name }}</td>
                            <td>{{ $value->event_category }}</td>
                            <td>{{ $value->order_status == 'Packing' ? 'Delivered' : $value->order_status }}</td>

                            <td class="text-center">
                                <a href="{{ route('update.order', ['id' => $value->order_id]) }}"
                                    class="btn btn-sm {{ $value->order_status == 'Packing' ? 'disabled' : 'btn-primary' }}">
                                    Update
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route("delete.order", $value->order_id)}}" class="text-danger fa-solid fa-trash" title="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
