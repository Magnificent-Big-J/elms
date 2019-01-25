@extends('layouts.master')
@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Dashboard</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>




            <h2 class="text-uppercase m-b-20">Booking Statistics</h2>
            <div class="row">

                <div class="col-lg-4 col-md-4 ">

                    <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">New Bookings</h6>
                        <h1 class="m-b-20 text-white counter">1,587</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Accepted Bookings</h6>
                        <h1 class="m-b-20 text-white counter">250</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Declined Booking</h6>
                        <h1 class="m-b-20 text-white counter">120</h1>

                    </div>
                </div>



            </div>
            <!-- end row -->
            <h2 class="text-uppercase m-b-20">Meeting Statics</h2>
            <div class="row">

                <div class="col-lg-4 col-md-4 ">

                    <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">New Meetings</h6>
                        <h1 class="m-b-20 text-white counter">1,587</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Accepted Meetings</h6>
                        <h1 class="m-b-20 text-white counter">250</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Declined Meetings</h6>
                        <h1 class="m-b-20 text-white counter">120</h1>

                    </div>
                </div>



            </div>
            <!-- end row -->
            <h2 class="text-uppercase m-b-20">Call Statistics</h2>
            <div class="row">



                <div class="col-lg-4 col-md-4 ">

                    <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">New Calls</h6>
                        <h1 class="m-b-20 text-white counter">1,587</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Accepted Calls</h6>
                        <h1 class="m-b-20 text-white counter">250</h1>

                    </div>
                </div>

                <div class=" col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Closed Calls</h6>
                        <h1 class="m-b-20 text-white counter">120</h1>

                    </div>
                </div>



            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-lg-6 col-md-6 ">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-bar-chart-o"></i> Budget</h3>

                        </div>

                        <div class="card-body">
                            <table class="table table-responsive-xl table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div><!-- end card-->
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-line-chart"></i> Projects</h3>

                        </div>

                        <div class="card-body"><table class="table table-responsive-xl table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div><!-- end card-->
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

@endsection