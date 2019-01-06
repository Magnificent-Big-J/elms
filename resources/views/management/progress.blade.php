@extends('layouts.elms')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Call Progress</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Call Progress

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Call Reason</th>
                <th>Logged By</th>
                <th>Accepted By</th>
                <th>Date</th>
                <th>Status</th>

                </thead>
                <tbody>
                @foreach($calls as $call)
                <tr >
                    <td>{{$call->callType->description}}</td>
                    <td>{{$call->user->name}} {{$call->user->surname}}</td>
                    <td>{{$call->accepted_by}} </td>
                    <td>{{$call->call_date}}</td>
                    <td>{{$call->status}}</td>

                </tr>
                    @endforeach
                </tbody>
            </table>
                {{$calls->links()}}
        </div>

    </div>
@endsection