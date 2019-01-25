@extends('layouts.master')
@section('content')


    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Bills History</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Bills History</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
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
        </div>
        <!-- END container-fluid -->

    </div>
@endsection