@extends('layouts.elms')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meetings To Be Attended</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

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

@endsection