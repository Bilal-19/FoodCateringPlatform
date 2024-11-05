@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Registered Users</h2>
        </div>

        <div class="row">
            @if (count($users) == 0)
                <p>No record found</p>
            @elseif (count($users) == 1)
                <p>{{ count($users) }} record found</p>
            @else
                <p>{{ count($users) }} records found</p>
            @endif
        </div>

        <div class="row">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $val)
                    <tr>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->email }}</td>
                        <td>
                            <a href="{{ route('reset.password', $val->id) }}" class="btn btn-primary btn-sm">Reset
                                Password</a>
                            <a href="{{ route('delete.account', $val->id) }}" class="btn btn-danger btn-sm">Delete Account</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
