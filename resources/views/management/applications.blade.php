@extends('layouts.master')
@section('content')


    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Application Management</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Application Management</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <app-application-management></app-application-management>
        </div>
        <!-- END container-fluid -->

    </div>
@endsection