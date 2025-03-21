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
                                    <a href="#" onclick="applyJob({{ $job->id }})" class="btn btn-primary"
                                        id="applyBtn">Apply</a>
                                @else
                                    <a href="javascript:void(0);" class="btn btn-primary disabled">Login to Apply</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <<<<<<<<<<<<<<<<<<<<<< --}}
                    @if (Auth::user())
                        @if (Auth::user()->id == $job->user_id)
                            <div class="card shadow border-0 mt-3">
                                <div class="job_details_header">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">

                                            <div class="jobs_conetent">
                                                <h4>Applicants</h4>
                                            </div>
                                        </div>
                                        <div class="jobs_right">

                                        </div>
                                    </div>
                                </div>
                                <div class="descript_wrap white-bg">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Applied Date</th>
                                        </tr>
                                        @if ($applications->isNotEmpty())
                                            @foreach ($applications as $application)
                                                <tr>
                                                    <td>{{ $application->user->name }}</td>
                                                    <td>{{ $application->user->email }}</td>
                                                    <td>{{ $application->user->mobile }}</td>
                                                    <td>{{ date_formated($application->applied_date) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" class="text-danger fw-bold">No Applicant Found for this
                                                    Job!</td>
                                            </tr>
                                        @endif

                                    </table>
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
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Published on:
                                        <span>{{ date_formated($job->created_at) }}</span>
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
@endsection

@section('customJs')
    <script>
        function applyJob(id) {
            if (confirm('Are you sure you want to apply for this job?')) {
                $.ajax({
                    url: '{{ route('applyJob') }}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}' // Ensure CSRF protection
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            showAlert('#successDiv', 'success', response.message);
                            // window.location.href = {{ route('account.myJobApplications') }}
                        } else {
                            showAlert('#errorDiv', 'danger', response.message);
                        }
                    },
                    error: function(xhr) {
                        showAlert('#errorDiv', 'danger', 'Error applying for the job.');
                    }
                });
            }
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
    </script>
@endsection
