 @extends('front.layouts.app')
 @section('main')
     <section class="section-5 bg-2">
         <div class="container py-5">
             <div class="row">
                 <div class="col">
                     {{-- <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                         <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                             <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Jobs</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Expired Jobs</li>
                         </ol>
                     </nav> --}}


                     <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                         <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                             <li class="breadcrumb-item"><a href="{{ route('admin.jobs') }}">Jobs</a></li>
                             <li class="breadcrumb-item active">Expired Jobs</li>
                         </ol>
                     </nav>

                 </div>
             </div>
             <div class="row mb-5">
                 <div class="col-lg-3">
                     @include('admin.sidebar')
                 </div>
                 <div class="col-lg-9">
                     @include('front.layouts.message')
                     <div class="card-body card-form shadow-lg rounded" style="border: 1px solid #c2f3ab">
                         <div class="">
                             <h3 class="fs-4 mb-1">Expired Jobs</h3>
                         </div>

                         <div class="table-responsive table-striped">
                             <table class="table text-center">
                                 <thead class="bg-light">
                                     <tr>
                                         <th scope="col">ID</th>
                                         <th scope="col">Title</th>
                                         <th scope="col">Posted By</th>
                                         <th scope="col">Expiry Date</th>
                                         <th scope="col">Status</th> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @if ($expiredJobs->isNotEmpty())
                                        @foreach ($expiredJobs as $job)
                                            <tr>
                                                <td>{{ $job->id }}</td>
                                                <td>{{ $job->title}}</td>
                                                <td>{{ $job->user->name }}</td>
                                                <td>
                                                    <span class="badge bg-danger">Expired on <br>{{ date_formated($job->expiry_date) }}</span>
                                                    
                                                </td>
                                                <td>
                                                    @if ($job->status == 1)
                                                        <span class="badge bg-success"> active </span>
                                                     @else
                                                         <span class="badge bg-danger"> blocked </span>
                                                    @endif
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
                                 {{-- {{ $jobs->links() }} --}}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection
