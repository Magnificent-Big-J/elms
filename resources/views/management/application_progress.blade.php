@extends('layouts.elms')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Application Progress</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

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

@endsection