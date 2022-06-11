<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>@yield('title', 'Attack on Titan Music')</title>
    <meta charset="utf-8" />
    <meta name="description" content="Attack on titan Music, Shingeki no kyojin music." />
    <meta name="keywords" content="attack,on,titan,shingeki,ost,sawano,yamamoto" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Attack on Titan Music" />
    <meta property="og:url" content="http://dode.host" />
    <meta property="og:site_name" content="Attack on Titan Music" />
    <link rel="canonical" href="http://dode.host" />
    <link rel="shortcut icon" href="{{asset('assets/media/mine/music-2-256.ico')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @yield('fonts')
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    @yield('css')
    <link href="{{asset('assets/css/style.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <!--end::Page Vendor Stylesheets-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url({{asset('assets/media/patterns/header-bg-dark.png')}})"
    class="dark-mode page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed">


    @include('partials._loader')


    <!--layout-partial:layout/master.html-->
    @include('layout.master')

    <!--layout-partial:partials/engage/_main.html-->

    <!--layout-partial:partials/_scrolltop.html-->

    @include('partials._scrolltop')


    <!--begin::Modals-->

    <!--layout-partial:partials/modals/_upgrade-plan.html-->


    <!--layout-partial:partials/modals/create-app/_main.html-->


    <!--layout-partial:partials/modals/create-campaign/_main.html-->


    <!--layout-partial:partials/modals/_invite-friends.html-->


    <!--layout-partial:partials/modals/users-search/_main.html-->
    @yield('modals')
    <!--end::Modals-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    {{-- <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script> --}}
    {{-- <script src="{{asset('datatables.bundle.css')}}"></script> --}}
    <!--begin::used by this page-->
    @yield('js')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
