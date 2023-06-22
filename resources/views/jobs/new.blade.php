@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div>
                Create New Job
            </div>

            <form action="{{ route('job.save') }}" method="POST" id="jobs-form">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right; margin:5px;">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#jobs-form').on('submit',  function (event) {
            event.preventDefault();
            

            var url = $(this).attr('action');
            $.ajax({
                url : url,
                method: 'POST',
                data : new FormData(this),
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                    alert(response.message)

                    //redirect to all jobs
                    
                    location.href = "{{ route('job.all') }}"
                },
                error: function(response) {
                    alert(response.error)
                }

            })
        });
    })
</script>
