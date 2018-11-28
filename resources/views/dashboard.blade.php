@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">Logged Call Statistics</h4>
                            <p class="category">Statistics</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Open
                                    <i class="fa fa-circle text-danger"></i> Bounce
                                    <i class="fa fa-circle text-warning"></i> Unsubscribe
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Meeting Statistics</h4>
                            <p class="category"></p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Approaved
                                    <i class="fa fa-circle text-warning"></i> Declined

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">2018 Projects</h4>
                            <p class="category">Statistics</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart"></div>


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Available Projects</h4>
                                <p class="category">Monthly</p>
                            </div>
                            <div class="content">



                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection