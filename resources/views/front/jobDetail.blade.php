@extends('front.layouts.app')
@section('main')
    <section class="section-4 bg-2">
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('jobs') }}"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container job_details_area">
            <div class="row pb-5">
                <div class="col-md-8">
                    {{-- @include('front.layouts.message') --}}
                    <div id="successDiv"></div>
                    <div id="errorDiv"></div>
                    <div class="card shadow border-0">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">

                                    <div class="jobs_conetent">
                                        <a href="#">
                                            <h4>{{ $job->title }}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i>{{ $job->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i>{{ $job->jobType->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now {{ $count == 1 ? 'saved-job' : '' }}" id="saveJobIcon">
                                        {{-- <a class="heart_mark" disabled href="javascript:void(0)"
                                            onclick="saveJob({{ $job->id }})"> <i class="fa fa-heart-o"
                                                aria-hidden="true"></i>
                                            </a> --}}
                                        <a class="heart_mark {{ Auth::check() ? '' : 'disabled' }}"
                                            href="javascript:void(0)"
                                            onclick="{{ Auth::check() ? 'saveJob(' . $job->id . ')' : 'return false;' }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ Auth::check() ? '' : 'Please login first' }}">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="descript_wrap white-bg">
                            <div class="single_wrap">
                                <h4>Job description</h4>
                                <p>{!! nl2br($job->description) !!}</p>

                            </div>
                            @if (!empty($job->responsibility))
                                <div class="single_wrap">
                                    <h4>Responsibility</h4>
                                    {!! nl2br($job->responsibility) !!}
                                </div>
                            @endif
                            @if (!empty($job->qualification))
                                <div class="single_wrap">
                                    <h4>Qualifications</h4>
                                    {!! nl2br($job->qualification) !!}
                                </div>
                            @endif
                            @if (!empty($job->benefits))
                                <div class="single_wrap">
                                    <h4>Benefits</h4>
                                    {!! nl2br($job->benefits) !!}
                                </div>
                            @endif
                            <div class="border-bottom"></div>
                            <div class="pt-3 text-end">
                                {{-- <a href="#" class="btn btn-secondary">Save</a> --}}
                                @if (Auth::check())
                                    <a href="#" onclick="saveJob({{ $job->id }})"
                                        class="btn btn-secondary">Save</a>
                                @else
                                    <a href="javascript:void(0);" class="btn btn-secondary disabled">Login to Save</a>
                                @endif
                                @if (Auth::check())
                                    {{-- <a href="#" onclick="applyJob({{ $job->id }})" class="btn btn-primary"
                                        id="applyBtn">Apply</a> --}}
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#applyModal{{ $job->id }}">
                                        Apply
                                    </button>
                                    <a href="{{ route('chatify') }}?user={{ $job->user_id }}" class="btn btn-primary">
                                        Message Employer
                                    </a>
                                @else
                                    <a href="{{ route('account.login') }}" class="btn btn-primary">Login to Apply</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <<<<<<<<<<<<<<<<<<<<<< --}}
                    @if (Auth::user())
                        @if (Auth::user()->id == $job->user_id)
                            <div class="card shadow border-0 mt-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Applicants</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-striped table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Resume</th>
                                                    <th>Download</th>
                                                    <th>Status</th>
                                                    <th>Applied Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($applications->isNotEmpty())
                                                    @foreach ($applications as $application)
                                                        <tr>
                                                            <td>{{ $application->user->name }}</td>
                                                            <td>{{ $application->user->email }}</td>
                                                            <td>{{ $application->user->mobile }}</td>
                                                            <td>
                                                                <a href="{{ route('employer.viewResume', $application->id) }}"
                                                                    class="btn btn-sm btn-outline-success">
                                                                    View
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('downloadResume', $application->id) }}"
                                                                    class="btn btn-sm btn-outline-danger">
                                                                    Download
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <form method="POST"
                                                                    class="d-flex align-items-center application-status-form">
                                                                    @csrf
                                                                    <input type="hidden" name="application_id"
                                                                        value="{{ $application->id }}">
                                                                    <select name="status"
                                                                        class="form-select form-select-sm me-2 w-auto application-status"
                                                                        data-id="{{ $application->id }}">
                                                                        <option value="pending"
                                                                            {{ $application->status == 'pending' ? 'selected' : '' }}>
                                                                            Pending</option>
                                                                        <option value="shortlisted"
                                                                            {{ $application->status == 'shortlisted' ? 'selected' : '' }}>
                                                                            Shortlist</option>
                                                                        <option value="rejected"
                                                                            {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                                                            Reject</option>
                                                                    </select>
                                                                </form>

                                                            </td>
                                                            <td>{{ date_formated($application->applied_date) }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center text-danger fw-bold">No
                                                            Applicant Found for this Job!</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endif
                    {{-- <<<<<<<<<<<<<<<<<<<<<< --}}
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Job Summery</h3>
                            </div>
                            <p><i class="bi bi-eye"></i> {{ $job->views }} Views</p>

                            <div class="job_content pt-3">
                                <ul>
                                    <li>Published on:
                                        <span>{{ date_formated($job->created_at) }}</span>
                                    </li>
                                    <li>Expired on:
                                        <span>{{ date_formated($job->expiry_date) }}</span>
                                    </li>
                                    <li>Vacancy: <span>{{ $job->vacancy }}</span></li>


                                    @if (!empty($job->salary))
                                        <li>Salary: <span>{{ $job->salary }}</span></li>
                                    @endif
                                    <li>Location: <span>{{ $job->location }}</span></li>
                                    <li>Job Nature: <span>{{ $job->jobType->name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 my-4">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Company Details</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Name: <span>{{ $job->company_name }}</span></li>

                                    @if (!empty($job->company_location))
                                        <li>Locaion: <span>{{ $job->company_location }}</span></li>
                                    @endif
                                    @if (!empty($job->company_website))
                                        <li>Webite: <span><a
                                                    href="{{ $job->company_website }}">{{ $job->company_website }}</a></span>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->


    <div class="modal fade" id="applyModal{{ $job->id }}" tabindex="-1">
        <div class="modal-dialog">
            <form id="resumeForm{{ $job->id }}" enctype="multipart/form-data" class="resume-form">

                {{-- {{ route('apply.job') }} --}}
                @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Apply for Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label>Select Resume</label>
                        <input type="file" name="resume" id="resume" class="form-control" required>
                        <p id="errorMsg" class="text-danger mx-3"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="applyJob({{ $job->id }})" class="btn btn-primary">Submit
                            Application</button>
                    </div>
                    <center class="text-center mb-5">Don't have resume &nbsp; <a
                            href="{{ route('create.Resume') }}">Create Resume</a></center>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        function applyJob(id) {

            // Get the form element by ID
            let form = $('#resumeForm' + id)[0];
            let formData = new FormData(form);
            $.ajax({
                url: "{{ route('applyJob') }}",
                type: 'POST',
                data: formData,
                processData: false, // Important for FormData
                contentType: false, // Important for FormData
                success: function(response) {
                    if (response.status === true) {
                        $('#applyModal' + id).modal('hide');
                        showAlert('#successDiv', 'success', response.message);
                    } else {
                        showAlert('#errorDiv', 'danger', response.message);
                    }
                    $("#errorMsg").html('')
                    $('#resumeForm{{ $job->id }}')[0].reset();
                    $('#applyModal' + id).modal('hide');
                },
                error: function(xhr) {
                    // showAlert('#errorDiv', 'danger', 'Error applying for the job.');
                    $("#errorMsg").html('<small>please choose the correct file type</small>')
                }
            });
        }


        function showAlert(selector, type, message) {

            var alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;

            $(selector).html(alertHtml).hide().slideDown();

            setTimeout(function() {
                $(selector).slideUp(function() {
                    $(this).html('');
                });
            }, 3000);
        }

        function saveJob(id) {
            $.ajax({
                url: '{{ route('saveJob') }}',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $("#saveJobIcon").addClass('saved-job');
                        showAlert('#successDiv', 'success', response.message);
                        // window.location.href = {{ route('account.myJobApplications') }}
                    } else {
                        showAlert('#errorDiv', 'danger', response.message);
                    }
                },
                error: function(xhr) {
                    showAlert('#errorDiv', 'danger', 'Error saving the job');
                }
            });
        }

        //   change applicants status into , shortlist , pending or rejected
     // Handle dropdown change
$(document).on('change', '.application-status', function () {
    var status = $(this).val();
    var applicationId = $(this).data('id'); 
    console.log(status, applicationId)
    $.ajax({
        url: '{{ route("employer.applicant.status") }}',
        method: 'POST',
        data: { 
            application_id: applicationId,
            status: status
        },
        success: function (response) {
            if (response.success) {
                alert('Status updated successfully!');
            } else {
                alert('Failed to update status.');
            }
        },
        error: function () {
            alert('Something went wrong.');
        }
    });
});

    </script>
@endsection
