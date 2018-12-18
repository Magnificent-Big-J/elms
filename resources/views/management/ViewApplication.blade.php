@extends('layouts.elms')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> View Application</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <app-view-application :id="{{$id}}"></app-view-application>
    <a href="{{route('applation.progress')}}" class="btn btn-primary mt-2">Return Back</a>

@endsection