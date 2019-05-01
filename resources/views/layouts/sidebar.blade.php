        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark sidebar-new-main-div">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- <a class="d-xl-none d-lg-none" href="#">Dashboard</a> -->
                    <button class="navbar-toggler mobile-bar-menu-icon-div" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column navbar-new-div">
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('home') ? 'active' : ''}}" href="index.html">
                                    <img src="assets/images/menu-icon1.png" class="img-fluid">                         
                                Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <img src="assets/images/menu-icon2.png" class="img-fluid">
                                Appointments</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('HomeController@customerList') }}">
                                    <img src="assets/images/menu-icon3.png" class="img-fluid">
                                Customers</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{Request::is('business_details') ? 'active' : ''}}" href="{{ action('BusinessDetailsController@index') }}">
                                    <img src="assets/images/menu-icon4.png" class="img-fluid">
                                Business Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <img src="assets/images/menu-icon5.png" class="img-fluid">
                                Settings</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <img src="assets/images/menu-icon6.png" class="img-fluid">
                                Membership</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <img src="assets/images/user-img.png" class="img-fluid">
                                LogOut</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->