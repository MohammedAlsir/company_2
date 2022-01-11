 <div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.html">
                    <img src="../../assets/admin/layout/img/logo.png" alt="logo" class="logo-default" />
                </a>
                <div class="menu-toggler sidebar-toggler hide">
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-close-others="true">
                            <img alt="" class="img-circle" src="../../assets/admin/layout/img/avatar3_small.jpg" />
                            <span class="username username-hide-on-mobile">
                                {{auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" > @csrf

                                        <input type="submit" value="تسجيل خروج">
                                </form>

                            </li>
                        </ul>




                    </li>
                    <!-- END USER LOGIN DROPDOWN -->

                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
