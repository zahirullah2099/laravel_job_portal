<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="list-group-item p-0">
                <a class="list-group-item d-flex justify-content-between align-items-center p-3" data-bs-toggle="collapse"
                    href="#jobSubmenu" role="button" aria-expanded="false" aria-controls="jobSubmenu">
                    Jobs
                    <i class="fa fa-chevron-down"></i>
                </a>
                <div class="collapse" id="jobSubmenu">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item ps-5">
                            <a href="{{ route('admin.jobs') }}">All Jobs</a>
                        </li>
                        <li class="list-group-item ps-5">
                            <a href="{{ route('admin.expiredJobs') }}">Expired Jobs</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.jobApplications') }}">Job Applications</a>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center p-3 btn">
                <a href="{{ route('account.logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>
