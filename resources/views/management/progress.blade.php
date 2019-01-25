@extends('layouts.master')
@section('content')
      <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Call Progress</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Call Progress</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
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
        </div>
        <!-- END container-fluid -->

    </div>
@endsection