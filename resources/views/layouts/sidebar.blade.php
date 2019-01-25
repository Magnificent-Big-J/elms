<!-- Left Sidebar -->
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>

                <li class="submenu">
                    <a class="{{Request::is('MyBills')?'active':''}}" href="{{route('Dashboard')}}"><i class="fa fa-fw fa-home"></i><span> Dashboard </span> </a>
                </li>
                @can('isResidence')
                    <li class="submenu">
                        <a class="{{Request::is('Log-Call')?'active':''}}" href="{{url('/Log-Call')}}"><i class="fa fa-barcode bigfonts"></i><span> Log Calls </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="{{Request::is('Log-Apply')?'active':''}}" href="{{url('/Apply')}}"><i class="fa fa-fw fa-bars"></i><span>Application </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="{{Request::is('Suggestions')?'active':''}}" href="{{url('/Suggestions')}}"><i class="fa fa-fw fa-area-chart"></i><span>Suggestions </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="{{Request::is('MyBills')?'active':''}}" href="{{url('/MyBills')}}"><i class="fa fa-fw fa-wpbeginner"></i><span>My Bills </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="{{Request::is('Bookings')?'active':''}}" href="{{url('/Bookings')}}"><i class="fa fa-fw fa-book"></i><span>Booking</span> </a>
                    </li>
                @endcan
                @can('isEmployee')
                    <li class="submenu">
                        <a class="{{Request::is('Bill')?'active':''}}" href="{{url('/Bill')}}"><i class="fa fa-fw fa-bank"></i><span>Bills Management</span> </a>
                    </li>

                    <li class="submenu">
                        <a class="{{Request::is('Manage-Payments')?'active':''}}" href="{{url('/Manage-Payments')}}"><i class="fa fa-fw fa-building-o"></i><span>Manage Bill Payments</span> </a>
                    </li>

                    <li class="submenu">
                        <a class="{{Request::is('Booking-Management')?'active':''}}" href="{{url('/Booking-Management')}}"><i class="fa fa-fw fa-cc"></i><span>Booking Management</span> </a>
                    </li>


                    <li class="submenu">
                        <a class="{{Request::is('Budgets')?'active':''}}" href="{{url('/Budgets')}}"><i class="fa fa-fw fa-credit-card"></i><span>Budget Management</span> </a>
                    </li>

                    <li class="submenu">
                        <a class="{{Request::is('Projects')?'active':''}}" href="{{url('/Projects')}}"><i class="fa fa-fw fa-cog"></i><span>Projects</span> </a>
                    </li>

                    <li class="submenu">
                        <a class="{{Request::is('Calls')?'active':''}}" href="{{url('/Calls')}}"><i class="fa fa-fw fa-phone-square"></i><span>Calls Management</span> </a>
                    </li>

                    <li class="submenu">
                        <a class="{{Request::is('users')?'active':''}}" href="{{url('/users')}}"><i class="fa fa-fw fa-users"></i><span>User Management</span> </a>
                    </li>



                @endcan
                @can('isWard')
                    <li class="submenu">
                        <a class="{{Request::is('Meetings')?'active':''}}" href="{{url('/Meetings')}}"><i class="fa fa-fw fa-eraser"></i><span>Meeting Management</span> </a>
                    </li>

                    <li class="submenu">
                        <a class="{{Request::is('Accepted-Meeting')?'active':''}}" href="{{url('/Accepted-Meeting')}}"><i class="fa fa-fw fa-list-alt"></i><span>Accepted Meeting</span> </a>
                    </li>

                @endcan
                <li class="submenu">
                    <a class="{{Request::is('Ward-Coucilor-Meetings')?'active':''}}" href="{{url('/Ward-Coucilor-Meetings')}}"><i class="fa fa-fw fa-bank"></i><span>Ward Councilor Meetings</span> </a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-th-list"></i> <span> Reports </span></a>

                </li>


                <li class="submenu">
                    <a class="{{Request::is('Call-Progress')?'active':''}}" href="{{url('/Call-Progress')}}"><i class="fa fa-fw fa-linode"></i><span>Call Progress</span> </a>
                </li>
                <li class="submenu">
                    <a class="{{Request::is('Application-Progress')?'active':''}}" href="{{url('/Application-Progress')}}"><i class="fa fa-fw fa-window-maximize"></i><span>Application Progress</span> </a>
                </li>
                <li class="submenu">
                    <a class="{{Request::is('Project-Suggestions')?'active':''}}" href="{{url('/Project-Suggestions')}}"><i class="fa fa-fw fa-briefcase"></i><span>Project Suggestions</span> </a>
                </li>
                @can('isEmployee|isResidence')
                    <li class="submenu">
                        <a class="{{Request::is('Ward-Coucilor-Meetings')?'active':''}}" href="{{url('/Ward-Coucilor-Meetings')}}"><i class="fa fa-fw fa-outdent"></i><span>Ward Coucilor Meetings</span> </a>
                    </li>

                @endcan
                @can('isEmployee')
                    <li class="submenu">
                        <a class="{{Request::is('Bill-History')?'active':''}}" href="{{url('/Bill-History')}}"><i class="fa fa-fw fa-chain-broken"></i><span> Bill Historys</span> </a>
                    </li>
                @endcan


            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->
