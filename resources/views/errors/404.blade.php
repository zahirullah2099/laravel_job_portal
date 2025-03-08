@extends('front.layouts.app')
@section('customCss')
<style>
    .error-container {
        max-width: 600px;
        text-align: center;
    }
    h1 {
        font-size: 80px;
        font-weight: bold;
        color: #dc3545;
    }
    .error-text {
        font-size: 20px;
        font-weight: 500;
    }
    .error-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
    }
</style>
@endsection
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div> 
            @section('main')
            <section class="error-section">
                <div class="container error-container">
                    <h1>404</h1>
                    <p class="text-muted error-text">Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    <p class="text-muted">Please check the URL and try again.</p>
                    <a href="{{ url('/') }}" class="btn btn-danger btn-lg"><span class="me-1">&larr;</span> Back to Home</a>
                </div>
            </section>
            
            
            @endsection
        </div>
    </section>
@endsection

@section('customJs')
    <script text="text/javascript">
       function removeJob(id) { 
    if (confirm('Are you sure you want to remove this job?')) {
        $.ajax({
            url: '{{ route("account.removeSavedjob") }}', // Correct route
            type: 'POST', // Ensure it's POST
            data: {
                id: id,
                _token: '{{ csrf_token() }}' // Required for Laravel POST requests
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) { 
                    location.reload(); 
                }  
            } 
        });
    }
}

    </script>
@endsection
