@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Customer Inquiries</h2>
        </div>

        <div class="row">
            <form action="{{ route('cutomer_inquiry') }}" method="get">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="Search by name or email">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="row mt-4">
            @if (count($customerQueries) == 0)
                <p>No record found</p>
            @elseif (count($customerQueries) == 1)
                <p>{{ count($customerQueries) }} record found</p>
            @else
                <p>{{ count($customerQueries) }} records found</p>
            @endif
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Message</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($customerQueries as $value)
                        <tr>
                            <td>{{ $value->customer_inquiry_id }}</td>
                            <td>{{ $value->customer_name }}</td>
                            <td>{{ $value->customer_email }}</td>
                            <td>{{ $value->customer_message }}</td>
                            <td class="text-center">
                                <a href="{{ route('delete.inquiry', $value->customer_inquiry_id) }}"
                                    class="text-danger fa-solid fa-trash" title="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
