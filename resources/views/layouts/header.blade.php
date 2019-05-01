
<div class="dashboard-main-wrapper">
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand main-logo-div" href="{{ route('home') }}">
                    <img src="assets/images/main-logo.png" class="img-fluid">
                </a>
                <button class="navbar-toggler mobile-bar-icon-div" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-right-top left-side-menu-main-div">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link" href="#">New Appointments</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link" href="#">New Customers</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto navbar-right-top right-side-menu-main-div">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <!-- <i class="fas fa-search"></i> -->
                                <img src="assets/images/search-img.png" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <!-- <i class="far fa-bell"></i>   -->
                                <img src="assets/images/bail-img.png" class="img-fluid">
                                <span class="circle-divs">2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown user-dropdown-menu-div">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/images/user-img.png" class="img-fluid">
                                Welcome Mahmood
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                              </div>
                            </div>


                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->