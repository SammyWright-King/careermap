@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-bg-dark text-center">
                <div class="card-header ">
                   
                    <a href="{{ route('job.all') }}" class="btn btn-primary btn-sm" style="float: right; margin:5px;">Back</a>
                </div>

                <div class="card-body">
                    <h4 class="card-title fw-bold"> {{$job->title }} </h4>
                    <p class="card-text"> {{ $job->description }} </p>

                </div>

                <div class="card-footer ">
                    2 days ago
                </div>

            </div>
        </div>
    </div>
</div>
@endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
