@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p class="mb-0 pb-0"><b>{{ session('success') }}</b></p>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p class="mb-0 pb-0"><b>{{ session('error') }}</b></p>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".session-alert").hide().slideDown(500); // Slide down effect when showing
        setTimeout(function () {
            $(".session-alert").slideUp(500); // Slide up effect after 3 seconds
        }, 3000);
    });
</script> --}}