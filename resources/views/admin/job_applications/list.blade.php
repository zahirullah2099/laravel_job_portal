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
                    <div class="card-body card-form shadow">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Job Applications</h3>
                            </div>

                        </div>
                        <div class="table-responsive table-striped">
                            <table class="table text-center">
                                <thead class="bg-light">
                                    <tr> 
                                        <th scope="col">Title</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Employer</th>
                                        <th scope="col">Applied Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jobApplications->isNotEmpty())
                                        @foreach ($jobApplications as $jobApplication)
                                            <tr class="active" id="job_{{ $jobApplication->id }}"> 
                                                <td>
                                                    <p>{{ $jobApplication->job->title }}</p>
                                                    {{-- <p>Applications{{ $job->applications->count() }}</p> --}}
                                                </td>
                                                <td>{{ $jobApplication->user->name }}</td> 
                                                <td>{{ $jobApplication->employer->name }}</td> 
                                                <td>{{ \Carbon\Carbon::parse($jobApplication->applied_date)->format('d M,Y') }}</td>
                                                <td>
                                                    <div class="action-dots ">
                                                        <button href="#" class="btn" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"> 
                                                            <li>
                                                                <a class="dropdown-item delete-job" href="#"
                                                                    data-id="{{ $jobApplication->id }}">
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
                                {{ $jobApplications->links() }}
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
                    url: '{{ route("admin.jobApplications.destroy") }}',
                    type: 'DELETE',
                    data: {
                       id : jobId
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
