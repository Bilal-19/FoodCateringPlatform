@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">View Trash Records</h2>
        </div>

        <div class="row">
            <h5>Orders</h5>
            <div class="col-md-12">
                <hr class="mt-0">
                @if (count($orders) == 0)
                    <p>No records found</p>
                @elseif (count($orders) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Selected Event</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($orders as $val)
                            <tr>
                                <td>{{ $val->order_id }}</td>
                                <td>{{ $val->customer_name }}</td>
                                <td>{{ $val->customer_email }}</td>
                                <td>{{ $val->event_category }}</td>
                                <td>
                                    <a href="{{ route('restore.order.trash', $val->order_id) }}"
                                        class="fa-solid fa-trash-arrow-up text-success" title="Restore"></a>
                                    <a href="{{ route('force.delete.order', $val->order_id) }}"
                                        class="fa-solid fa-trash text-danger" title="Permanent Delete"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <h5>Menu</h5>
            <div class="col-md-12">
                <hr class="mt-0">
                @if (count($menu) == 0)
                    <p>No records found</p>
                @elseif (count($menu) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Item Category</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($menu as $val)
                            <tr>
                                <td>{{ $val->menu_id }}</td>
                                <td>{{ $val->item_label }}</td>
                                <td>{{ $val->item_category }}</td>
                                <td>{{ $val->item_price }}</td>
                                <td>
                                    <a href="{{ route('restore.menu', $val->menu_id) }}"
                                        class="fa-solid fa-trash-arrow-up text-success" title="Restore"></a>
                                    <a href="{{ route('delete.menu', $val->menu_id) }}"
                                        class="fa-solid fa-trash text-danger" title="Permanent Delete"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>

        </div>

    </div>
@endsection
