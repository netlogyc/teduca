<!-- Sidemenu -->
<div class="navbar-content scroll-div ps ps--active-y">
    <ul class="nav pcoded-inner-navbar">

        <li class="nav-item {{ Request::is('student/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('student.dashboard.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-desktop"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_dashboard', 1) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/class-routine*') ? 'active' : '' }}">
            <a href="{{ route('student.class-routine.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-clock"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_class_routine', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/exam-routine*') ? 'active' : '' }}">
            <a href="{{ route('student.exam-routine.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-align-left"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_exam_routine', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/attendance*') ? 'active' : '' }}">
            <a href="{{ route('student.attendance.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-calendar-check"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_attendance', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/leave*') ? 'active' : '' }}">
            <a href="{{ route('student.leave.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="far fa-edit"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_apply_leave', 2) }}</span>
            </a>
        </li>

        {{-- <li class="nav-item {{ Request::is('student/event-calendar*') ? 'active' : '' }}">
            <a href="{{ route('student.event.calendar') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-calendar-alt"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_calendar', 1) }}</span>
            </a>
        </li> --}}

        <li class="nav-item {{ Request::is('student/fees*') ? 'active' : '' }}">
            <a href="{{ route('student.fees.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-money-bill-wave"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_fees_report', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/library*') ? 'active' : '' }}">
            <a href="{{ route('student.library.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-book-open"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_library', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/notice*') ? 'active' : '' }}">
            <a href="{{ route('student.notice.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-bullhorn"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_notice', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/assignment*') ? 'active' : '' }}">
            <a href="{{ route('student.assignment.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-newspaper"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_assignment', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/download*') ? 'active' : '' }}">
            <a href="{{ route('student.download.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-download"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_download', 2) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/transcript*') ? 'active' : '' }}">
            <a href="{{ route('student.transcript.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-pen-square"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_transcript', 1) }}</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('student/profile*') ? 'active' : '' }}">
            <a href="{{ route('student.profile.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-id-card"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_profile', 2) }}</span>
            </a>
        </li>

    </ul>
</div>
<!-- End Sidebar -->