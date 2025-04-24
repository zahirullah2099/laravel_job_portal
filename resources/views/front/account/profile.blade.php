@extends('front.layouts.app')
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
            <div class="row">
                <div class="col-lg-3">
                    @include('front.account.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.layouts.message')
                    <div class="card border-0 shadow mb-4">
                        <form action="" id="userForm" name="userForm">
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">My Profile</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Name*</label>
                                    <input type="text" placeholder="Enter Name" name="name" id="name"
                                        class="form-control" value="{{ $user->name }}">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" placeholder="Enter Email" name="email" id="email"
                                        class="form-control" value="{{ $user->email }}">
                                    <p></p>
                                </div>
                                {{-- <div class="mb-4">
                                    <label for="" class="mb-2">Designation</label>
                                    <input type="text" placeholder="Designation" name="designation" id="designation"
                                        class="form-control" value="{{ $user->designation }}">
                                </div> --}}
                                <div class="mb-4">
                                    <label for="" class="mb-2">Designation</label>
                                    <select name="designation" id="designation" class="form-control form-select">
                                        <option value="">Select Designation</option>
                                        <option value="Web Developer" {{ $user->designation == 'Web Developer' ? 'selected' : '' }}>Web Developer</option>
                                        <option value="Software Engineer" {{ $user->designation == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                                        <option value="Data Analyst" {{ $user->designation == 'Data Analyst' ? 'selected' : '' }}>Data Analyst</option>
                                        <option value="UI/UX Designer" {{ $user->designation == 'UI/UX Designer' ? 'selected' : '' }}>UI/UX Designer</option>
                                        <option value="Project Manager" {{ $user->designation == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
                                        {{-- Add more as needed --}}
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="" class="mb-2">Mobile</label>
                                    <input type="text" placeholder="Mobile" name="mobile" id="mobile"
                                        class="form-control" value="{{ $user->mobile }}">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    {{-- PASSWORD SECTION START --}}
                    <div class="card border-0 shadow mb-4">
                        <div id="successDiv"></div>
                        <div id="errorDiv"></div>
                        <form action="" method="post" id="changePasswordForm" name="changePasswordForm">
                            <div class="card-body p-4">
                                <h3 class="fs-4 mb-1">Change Password</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Old Password*</label>
                                    <input type="password" name="old_password" id="old_password" placeholder="Old Password"
                                        class="form-control">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">New Password*</label>
                                    <input type="password" name="new_password" id="new_password" placeholder="New Password"
                                        class="form-control">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Confirm Password*</label>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        placeholder="Confirm Password" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script text="text/javascript">
        $("#userForm").on('submit', (e) => {
            e.preventDefault();
            $.ajax({
                url: '{{ route('account.updateProfile') }}',
                type: 'put',
                dataType: 'json',
                data: $("#userForm").serializeArray(),
                success: function(response) {
                    if (response.status == true) {
                        $("#name")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#email")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                        window.location.reload();
                    } else {
                        var errors = response.errors;
                        if (errors.name) {
                            $("#name")
                                .addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $("#name")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.email) {
                            $("#email")
                                .addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email)
                        } else {
                            $("#email")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }
                }
            });
        })

        // update password
        $("#changePasswordForm").on('submit', (e) => {
            e.preventDefault();
            $.ajax({
                url: '{{ route("account.updatePassword") }}',
                type: 'post',
                dataType: 'json',
                data: $("#changePasswordForm").serializeArray(),
                success: function(response) {
                    if (response.status == true) {
                        showAlert('#successDiv', 'success', response.message);
                        $("#old_password")
                            .removeClass('is-invalid').val('')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#new_password")
                            .removeClass('is-invalid').val('')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                        $("#confirm_password")
                            .removeClass('is-invalid').val('')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                    } else {
                        var errors = response.errors; 
                        if (errors.old_password) {
                            $("#old_password")
                                .addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.old_password)
                        } else {
                            $("#old_password")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.new_password) {
                            $("#new_password")
                                .addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.new_password)
                        } else {
                            $("#new_password")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.confirm_password) {
                            $("#confirm_password")
                                .addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.confirm_password)
                        } else {
                            $("#confirm_password")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }
                }
            });

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
        })
    </script>
@endsection
