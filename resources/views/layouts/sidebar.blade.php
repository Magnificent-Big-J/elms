<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
               Emalahleni Local Municipality
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{url('/Dashboard')}}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{url('/Profile')}}">
                    <i class="pe-7s-user"></i>
                    <p>Profile</p>
                </a>
            </li>
            <li>
                <a href="table.html">
                    <i class="pe-7s-cash"></i>
                    <p>Bills</p>
                </a>
            </li>
            <li>
                <a href="typography.html">
                    <i class="pe-7s-news-paper"></i>
                    <p>Budgets</p>
                </a>
            </li>
            <li>
                <a href="{{url('Projects')}}">
                    <i class="pe-7s-science"></i>
                    <p>Projects</p>
                </a>
            </li>

            <li>
                <a href="{{url('Calls')}}">
                    <i class="pe-7s-menu"></i>
                    <p>Calls</p>
                </a>
            </li>
            <li>
                <a href="{{url('users')}}">
                    <i class="pe-7s-monitor"></i>
                    <p>Users Management</p>
                </a>
            </li>

            <li>
                <a href="{{url('Meetings')}}">
                    <i class="pe-7s-date"></i>
                    <p>Meetings</p>
                </a>
            </li>

        </ul>
    </div>
</div>