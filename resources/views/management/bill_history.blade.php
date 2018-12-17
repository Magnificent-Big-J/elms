@extends('layouts.elms')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bills History</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="loader-wrapper" v-if="data_isLoading" >

            <div id="loader"></div>

        </div>
        <div class="card-header">Manage Bill Payments</div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-stripped">
                <thead>
                <th>Full Name </th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>


                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr >
                        <td>{{$bill->user->name}} {{$bill->user->surname}}</td>
                        <td>{{$bill->bill_month}}</td>
                        <td>R{{$bill->amount}}</td>
                        @if($bill->status=="paid")
                            <td class="bg-success">{{$bill->status}}</td>
                        @else
                            <td class="bg-warning">{{$bill->status}}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$bills->links()}}
        </div>
    </div>

@endsection