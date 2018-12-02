<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{Request::is('Profile')?'active':''}}" href="{{url('/Profile')}}" >
                    <span data-feather="home"></span>
                    {{ Auth::user()->name }} {{ Auth::user()->surname }} <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Dashboard')?'active':''}}" href="{{url('/Dashboard')}}" >
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Profile')?'active':''}}"   href="{{url('/Profile')}}">
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            @can('isResidence')
            <li class="nav-item">
                <a class="nav-link {{Request::is('Log-Call')?'active':''}}" href="{{url('/Log-Call')}}">
                    <span data-feather="disc"></span>
                    Log Call
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Apply')?'active':''}}" href="{{url('/Apply')}}">
                    <span data-feather="users"></span>
                    Apply
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Suggestions')?'active':''}}" href="{{url('/Suggestions')}}">
                    <span data-feather="cast"></span>
                    Suggestions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('MyBills')?'active':''}}" href="{{url('/MyBills')}}">
                    <span data-feather="command"></span>
                    My Bills
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Bookings')?'active':''}}" href="{{url('/Bookings')}}">
                    <span data-feather="layers"></span>
                    Booking
                </a>
            </li>
            @endcan
            @can('isEmployee')
            <li class="nav-item">
                <a class="nav-link {{Request::is('Bill')?'active':''}}" href="{{url('Bill')}}">
                    <span data-feather="archive"></span>
                    Bills Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Booking-Management')?'active':''}}" href="{{url('/Booking-Management')}}">
                    <span data-feather="layers"></span>
                    Booking Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Application-Management')?'active':''}}" href="{{url('/Application-Management')}}">
                    <span data-feather="credit-card"></span>
                    Application Management
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{Request::is('Budgets')?'active':''}}" href="{{url('/Budgets')}}">
                    <span data-feather="clipboard"></span>
                    Budget Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('Projects')?'active':''}}" href="{{url('/Projects')}}">
                    <span data-feather="activity"></span>
                    Projects
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{Request::is('Calls')?'active':''}}" href="{{url('/Calls')}}">
                    <span data-feather="bell"></span>
                    Calls Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('users')?'active':''}}" href="{{url('/users')}}">
                    <span data-feather="crosshair"></span>
                    User Management
                </a>
            </li>
            @endcan
            @can('isWard')
            <li class="nav-item">
                <a class="nav-link {{Request::is('Meetings')?'active':''}}" href="{{url('/Meetings')}}">
                    <span data-feather="calendar"></span>
                    Meeting Management
                </a>
            </li>
            @endcan
        </ul>

    </div>
</nav>
