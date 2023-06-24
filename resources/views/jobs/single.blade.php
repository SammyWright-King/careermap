@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-bg-dark text-center">
                <div class="card-header ">
                   
                    <a href="{{ route('job.all') }}" class="btn btn-primary btn-sm" style="float: right; margin:5px;">Back</a>
                </div>

                <div class="card-body" id="content"></div>

                <div class="card-footer" id="job-date">
                   
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

        //extract id
        var current_url = location.href;
        var id = current_url.substring(current_url.lastIndexOf('/') + 1);

        var url = `/job/single/${id}`;
        $.ajax({
            url : url,
            method: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success : (response)=>{
                var job = response.job;
                
                addToHtml(job.title, job.description, job.updated_at)
                
            },
            error: function(response) {
                alert(response.error)
            }

        })
        
    })

    /**
     * function to append title and description to page
     */
    function addToHtml(title, description, date)
    {
        date = new Date(date).toLocaleString('uk', { timeZone: 'UTC' })
        $("#content").append(`<h4 class='card-title fw-bold'>${title}</h4>`);
        $("#content").append(`<p class='card-text'>${description}</>`);
        $("#job-date").append(`${date}`);
    }
</script>