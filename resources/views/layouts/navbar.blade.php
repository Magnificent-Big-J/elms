<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse">


            <ul class="nav navbar-nav navbar-right">
                <li class = "{{Request::is('Apply')?'active':''}}">
                    <a href="{{url('Apply')}}">

                        <p>Apply</p>
                    </a>
                </li>
                <li class = "{{Request::is('MyBills')?'active':''}}">
                    <a href="{{url('MyBills')}}">
                        <p>My Bills</p>
                    </a>
                </li>
                <li class = "{{Request::is('Bookings')?'active':''}}">
                    <a href="{{url('Bookings')}}">
                        <p>Booking</p>
                    </a>
                </li>
                <li class = "{{Request::is('Suggestions')?'active':''}}">
                    <a href="{{url('Suggestions')}}">

                        <p>Suggestions</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>Log out</p>
                    </a>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>