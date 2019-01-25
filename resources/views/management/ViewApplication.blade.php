@extends('layouts.master')
@section('content')
       <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">View Application</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">View Application</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <app-view-application :id="{{$id}}"></app-view-application>
            <a href="{{route('applation.progress')}}" class="btn btn-primary mt-2">Return Back</a>
        </div>
        <!-- END container-fluid -->

    </div>

@endsection