@extends('layouts.master')
@section('content')

    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Meetings To Be Attendedt</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Meetings To Be Attended</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Meetings To Be Attended
                </div>
                <div class="card-body">
                    <div id="loader-wrapper" v-if="data_isLoading" >

                        <div id="loader"></div>

                    </div>
                    <table class="table table-stripped table-bordered">
                        <thead>
                        <th>Agenda</th>
                        <th>Address</th>
                        <th>From</th>
                        <th>To</th>

                        </thead>
                        <tbody>
                        @foreach($meetings as $meeting)
                            <tr >
                                <td>{{$meeting->meetingType->description}}</td>
                                <td>{{$meeting->address}}</td>
                                <td>{{$meeting->start_date}}</td>
                                <td>{{$meeting->end_date}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
        <!-- END container-fluid -->

    </div>
@endsection