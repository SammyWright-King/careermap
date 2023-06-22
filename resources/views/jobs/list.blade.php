@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header container-fluid">
                    All Jobs
                    <a href="{{ route('job.create') }}" class="btn btn-primary btn-sm" style="float: right; margin:5px;">New Job</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush" id="list">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url : "{{ route('jobs') }}",
            method: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success : (response)=>{
                
                var jobs = response.jobs;
                
                jobs.forEach((job)=>{
                    addToHtml(`${job.title}`, `${job.description}`, job.id)
                });
                
            },
            error: function(response) {
                alert(response.error)
            }

        })
        
    })

    /**
     * function to append list to page
     */
    function addToHtml(title, description, id)
    {
        //trim description
        description = description.substring(0, 20)

        $("#list").append(`<li class='list-group-item'>
                                <a href="/job/${id}">${title}</a>
                                <p>${description}</p>
                            </li>`);
    }
</script>
