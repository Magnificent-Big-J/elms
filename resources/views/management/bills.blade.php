@extends('layouts.elms')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bills</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div class="card">
        <div class="card-header">Bills Management</div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-stripped">
                <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>Amount</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>12 XXX street</td>
                    <td>R458.00</td>
                    <td><button class="btn btn-info btn-xs">Upload Bills</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection