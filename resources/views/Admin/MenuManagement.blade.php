@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Menu Management</h2>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('MenuManagement') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Search Item by Name, Category">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-md-2">
                <button class="btn btn-danger">Reset</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                @if (count($menu) == 0)
                    <p>No record found</p>
                @elseif(count($menu) == 1)
                    <p>{{ count($menu) }} record found</p>
                @else
                    <p>{{ count($menu) }} records found</p>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <tr class="text-center">
                        <th>S.No</th>
                        <th>Preview Image</th>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($menu as $val)
                        <tr>
                            <td>{{ $val->menu_id }}</td>
                            <td class="text-center">
                                <img src="{{ asset('images/' . $val->item_image) }}" alt="Menu Image"
                                    style="height: 80px; width: 80px; border-radius:50%; object-fit:cover">
                            </td>
                            <td>{{ $val->item_label }}</td>
                            <td>{{ $val->item_category }}</td>
                            <td>{{ $val->item_price }} PKR</td>
                            <td class="text-center">
                                <a href="{{ route('edit-menu', ['id' => $val->menu_id]) }}"
                                    class="text-success fa-solid fa-pen-to-square" title="Edit">
                                </a>
                                <a href="{{ route('delete-menu', ['id' => $val->menu_id]) }}"
                                    class="text-danger fa-solid fa-trash  mx-3" title="Delete">
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
