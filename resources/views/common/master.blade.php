<!DOCTYPE HTML>
<html>
    <!-- All tags in head -->
    @include ('common.head')
    
    <!-- Body Start -->
    <body>

        <div class="page-loader"></div>

        <div id="back-to-top" class="desktop-back-to-top hidden-sm hidden-xs"><a href="#" class="orange-text"><i class="fa fa-arrow-circle-o-up fa-fw fa-3x" aria-hidden="true"></i></a></div>

            @include ('common.mobile-nav')

        <div id="main-page">
            
            <!-- Start Header -->
            @include ('common.header')
            <!-- End Header -->
            
        <div id="page-content">

            <!-- Content Start -->
            @yield('page-content')
            <!-- Content End -->

        </div>

        <!-- Start footer contents -->
        @include('common.footer')
        <!-- End footer contents -->
        
        </div> <!-- End of main-page -->

        <!-- Start scripts included in footer -->
        @include ('common.footer_scripts')
        <!-- End scripts included in footer -->

    </body>
    <!-- Body End -->

</html>
