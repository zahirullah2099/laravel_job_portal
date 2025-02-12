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