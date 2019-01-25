@extends('layouts.master')
@section('content')


    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Application Progress</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Application Progress</li>
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

                <div class="card-header">Application Progress</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped">
                        <thead>
                        <th>Application Type</th>
                        <th>Date</th>
                        <th>Full Name</th>
                        <th>Status</th>

                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($plans as $plan)
                            <tr >
                                <td>{{$plan->planType->description}} </td>
                                <td>{{$plan->plan_date}} </td>
                                <td>{{$plan->user->name}} {{$plan->user->surname}}</td>
                                <td>{{$plan->status}}</td>
                                <td>
                                    <a href="{{route('view.applation',$plan->id)}}" class="btn btn-info btn-sm">View</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$plans->links()}}
                </div>
            </div>
        </div>
        <!-- END container-fluid -->

    </div>

@endsection