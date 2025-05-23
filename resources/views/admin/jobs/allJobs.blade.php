 @extends('front.layouts.app')
 @section('main')
     <section class="section-5 bg-2">
         <div class="container py-5">
             <div class="row">
                 <div class="col">
                     <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                         <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                             <li class="breadcrumb-item active">Jobs</li>
                         </ol>
                     </nav>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-3">
                     @include('admin.sidebar')
                 </div>
                 <div class="col-lg-9">
                     @include('front.layouts.message')
                     <div class="card-body card-form shadow-lg rounded" style="border: 1px solid #c2f3ab">
                         <div class="d-flex justify-content-between align-items-center mb-2">
                             <h3 class="fs-4 mb-1">Jobs</h3>

                             @if ($expiredJobs > 0)
                                 <div class="alert alert-danger mb-0 py-2 px-3 d-flex align-items-center">
                                     <div class="me-3">
                                         <strong>{{ $expiredJobs }}</strong> job(s) have expired.
                                     </div>
                                     <a href="{{ route('admin.expiredJobs') }}" class="btn btn-sm btn-light">
                                         View Expired Jobs
                                     </a>
                                 </div>
                             @endif
                         </div>

                         <div class="table-responsive table-striped">
                             <table class="table text-center">
                                 <thead class="bg-light">
                                     <tr>
                                         <th scope="col">ID</th>
                                         <th scope="col">Title</th>
                                         <th scope="col">Create By</th>
                                         <th scope="col">Status</th>
                                         <th scope="col">Date</th>
                                         <th scope="col">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @if ($jobs->isNotEmpty())
                                         @foreach ($jobs as $job)
                                             <tr class="active" id="job_{{ $job->id }}">
                                                 <td>{{ $job->id }}</td>
                                                 <td>
                                                     <p>{{ $job->title }}</p>
                                                     <p><strong>{{ $job->applications->count() }}</strong> Applicants</p>
                                                 </td>
                                                 <td>{{ $job->user->name }}</td>
                                                 <td>
                                                     @if ($job->status == 1)
                                                         <span class="badge bg-success"> active </span>
                                                     @else
                                                         <span class="badge bg-danger"> blocked </span>
                                                     @endif

                                                 </td>
                                                 <td>{{ date_formated($job->created_at) }}</td>
                                                 <td>
                                                     <div class="action-dots ">
                                                         <button href="#" class="btn" data-bs-toggle="dropdown"
                                                             aria-expanded="false">
                                                             <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                         </button>
                                                         <ul class="dropdown-menu dropdown-menu-end">
                                                             <li><a class="dropdown-item"
                                                                     href="{{ route('admin.jobs.edit', $job->id) }}"><i
                                                                         class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                             </li>
                                                             <li>
                                                                 <a class="dropdown-item delete-job" href="#"
                                                                     data-id="{{ $job->id }}">
                                                                     <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                                 </a>
                                                             </li>
                                                         </ul>
                                                     </div>
                                                 </td>
                                             </tr>
                                         @endforeach
                                     @else
                                         <tr>
                                             <td class="text-danger text-center"><b>you dont have post any job!</b></td>
                                         </tr>
                                     @endif
                                 </tbody>

                             </table>
                             <div>
                                 {{ $jobs->links() }}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection

 @section('customJs')
     <script>
         $(document).on('click', '.delete-job', function() {
             let jobId = $(this).data('id');
             if (confirm('Are you sure you want to delete the job?')) {
                 $.ajax({
                     url: '{{ route('admin.jobs.destroy') }}',
                     type: 'DELETE',
                     data: {
                         id: jobId
                     },
                     dataType: 'json',
                     success: function(response) {
                         window.location.reload();
                     }
                 });
             }
         });
     </script>
 @endsection
