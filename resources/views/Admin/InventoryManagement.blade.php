@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Inventory Management</h2>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('add.inventory') }}" class="btn btn-success">Add New Inventory</a>
            </div>
        </div>

        <div class="row  mt-2">
            <div class="col-md-12">
                <form action="{{ route('view.inventory') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control"
                            placeholder="search by item name, quantity, supplier name">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row  mt-2">
            <div class="col-md-12">
                @if (count($inventory) > 0)
                    <p>{{ count($inventory) }} records found</p>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Quantity</th>
                            <th>Item Purchase Date</th>
                            <th>Item Cost</th>
                            <th>Supplier Name</th>
                            <th>Supplier Contact No</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($inventory as $value)
                            <tr>

                                <td>{{ $value->item_name }}</td>
                                <td>{{ $value->item_quantity }} {{ $value->item_quantity_unit }}</td>
                                <td>{{ date_format(date_create($value->item_purchase_date), 'd-M-Y') }}</td>
                                <td>{{ $value->item_cost }}</td>
                                <td>{{ $value->supplier_name }}</td>
                                <td>{{ $value->supplier_contactno }}</td>
                                <td>
                                    <a href="{{ route('update.inventory', $value->inventory_id) }}"
                                        class="text-success fa-solid fa-pen-to-square" title="Edit"></a>
                                    <a href="{{ route('delete.inventory', $value->inventory_id) }}"
                                        class="text-danger fa-solid fa-trash" title="Delete"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @elseif (count($inventory) == 0)
                    <p>No records found</p>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Quantity</th>
                            <th>Item Purchase Date</th>
                            <th>Item Cost</th>
                            <th>Supplier Name</th>
                            <th>Supplier Contact No</th>
                            <th>Action</th>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
