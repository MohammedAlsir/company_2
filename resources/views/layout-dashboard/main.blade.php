<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- BEGIN HEAD -->

@include('layout-dashboard.head')


<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo ">
    <!-- BEGIN HEADER -->
   @include('layout-dashboard.header')
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
       @include('layout-dashboard.menu')
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @include('partials._msg')

                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                    @yield('main_title')
                </h3>

                <!-- END PAGE HEADER-->
                <!-- BEGIN DASHBOARD STATS -->

                @yield('content')
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->

        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">
            2022 &copy; كل الحقوق محفوظة.
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>

    @include('layout-dashboard.js')
    @yield('afterJs')


</body>
<!-- END BODY -->

</html>
