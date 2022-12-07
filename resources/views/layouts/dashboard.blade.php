<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> @yield('title', 'Page Title') </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- style css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('styles')
</head>

<body class="main-body app sidebar-mini ltr">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page custom-index">
        <div>
            <!-- main-header -->
            <div class="main-header side-header sticky nav nav-item">
                <div class="container-fluid main-container ">
                    <div class="main-header-left ">
                        <div class="responsive-logo">
                            <a href="index.html" class="header-logo">
                                <img src="{{ asset('assets/img/brand/logo.png') }}" class="logo-1" alt="logo">
                                <img src="{{ asset('assets/img/brand/logo-white.png') }}" class="dark-logo-1"
                                    alt="logo">
                            </a>
                        </div>
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="javascript:void(0);"><i
                                    class="header-icon fe fe-align-left"></i></a>
                            <a class="close-toggle" href="javascript:void(0);"><i class="header-icons fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="main-header-right">
                        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                            aria-controls="navbarSupportedContent-4" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fe fe-more-vertical "></span>
                        </button>
                        <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                <ul class="nav nav-item  navbar-nav-right ms-auto">
                                    <li class="dropdown nav-item main-layout">
                                        <a class="new nav-link theme-layout nav-link-bg layout-setting">
                                            <span class="dark-layout"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="header-icon-svgs" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z" />
                                                </svg></span>
                                            <span class="light-layout"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="header-icon-svgs" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z" />
                                                </svg></span>
                                        </a>
                                    </li>

                                    <x-notfication-menu count="7" />

                                    <li class="nav-link search-icon d-lg-none d-block">
                                        <form class="navbar-form" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                    <button type="reset" class="btn btn-default">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-default nav-link resp-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                            class="header-icon-svgs" viewBox="0 0 24 24"
                                                            width="24px" fill="#000000">
                                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                                            <path
                                                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </li>
                                    <li class="nav-item full-screen fullscreen-button">
                                        <a class="new nav-link full-screen-link" href="javascript:void(0);"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-maximize">
                                                <path
                                                    d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                                </path>
                                            </svg></a>
                                    </li>
                                    <li class="dropdown main-profile-menu nav nav-item nav-link">
                                        <a class="profile-user d-flex" href=""><img alt=""
                                                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"></a>
                                        <div class="dropdown-menu">
                                            <div class="main-header-profile bg-primary p-3">
                                                <div class="d-flex wd-100p">
                                                    <div class="main-img-user"><img alt=""
                                                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                                            class=""></div>
                                                    <div class="ms-3 my-auto">
                                                        <h6>{{ Auth::user()->name }}</h6><span>Premium Member</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="dropdown-item" href="{{ route('dashboard.profile.edit') }}"><i
                                                    class="bx bx-user-circle"></i>Profile</a>
                                            <a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit
                                                Profile</a>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-log-out"></i>
                                                    Sign Out</button>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="dropdown main-header-message right-toggle">
                                        <a class="nav-link pe-0" data-bs-toggle="sidebar-right"
                                            data-bs-target=".sidebar-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-menu">
                                                <line x1="3" y1="12" x2="21" y2="12">
                                                </line>
                                                <line x1="3" y1="6" x2="21" y2="6">
                                                </line>
                                                <line x1="3" y1="18" x2="21" y2="18">
                                                </line>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main-header -->

            <!-- main-sidebar -->
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="sticky">
                {{-- @include('layouts.partials.nav') --}}
                <x-nav />
            </div>
            <!-- main-sidebar -->
        </div>

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            @section('breadcrumb')
                                <h4 class="content-title mb-0 my-auto">Dashboard</h4>
                            @show
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->
                @yield('content')
            </div>
        </div>
        <!-- /main-content -->
        <!-- Sidebar-right-->
        <div class="sidebar sidebar-right sidebar-animate">
            <div class="panel panel-primary card mb-0 box-shadow">
                <div class="tab-menu-heading border-0 p-3">
                    <div class="card-title mb-0">Notifications</div>
                    <div class="card-options ms-auto">
                        <a href="javascript:void(0);" class="sidebar-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class=""><a href="#side1" class="active" data-bs-toggle="tab"><i
                                        class="ion ion-md-chatboxes tx-18 me-2"></i> Chat</a></li>
                            <li><a href="#side2" data-bs-toggle="tab"><i
                                        class="ion ion-md-notifications tx-18  me-2"></i> Notifications</a></li>
                            <li><a href="#side3" data-bs-toggle="tab"><i class="ion ion-md-contacts tx-18 me-2"></i>
                                    Friends</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active " id="side1">
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-primary brround avatar-md">CH</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>New Websites is Created</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">30 mins ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-danger brround avatar-md">N</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare For the Next Project</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">2 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-info brround avatar-md">S</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Decide the live Discussion</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">3 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-warning brround avatar-md">K</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Meeting at 3:00 pm</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">4 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-success brround avatar-md">R</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">1 day ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-pink brround avatar-md">MS</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">1 day ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-purple brround avatar-md">L</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">45 minutes ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center p-3">
                                <div class="">
                                    <span class="avatar bg-blue brround avatar-md">U</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1"></i>
                                            <small class="text-muted ms-auto">2 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane  " id="side2">
                            <div class="list-group list-group-flush ">
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/12.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Madeleine</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            3 hours ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/1.jpg') }}"></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Anthony</strong> New product Launching...
                                        <div class="small text-muted">
                                            5 hour ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/2.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Olivia</strong> New Schedule Realease......
                                        <div class="small text-muted">
                                            45 minutes ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/8.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Madeleine</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            3 hours ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/11.jpg') }}"></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Anthony</strong> New product Launching...
                                        <div class="small text-muted">
                                            5 hour ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/6.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Olivia</strong> New Schedule Realease......
                                        <div class="small text-muted">
                                            45 minutes ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/9.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-3">
                                        <strong>Olivia</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            12 minutes ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  " id="side3">
                            <div class="list-group list-group-flush ">
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/9.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Mozelle Belt</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/11.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Florinda Carasco</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/10.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Alina Bernier</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/2.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Zula Mclaughin</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/13.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Isidro Heide</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/12.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Mozelle Belt</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/4.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Florinda Carasco</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/7.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Alina Bernier</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/2.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Zula Mclaughin</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/14.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Isidro Heide</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/11.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Florinda Carasco</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/9.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Alina Bernier</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/15.jpg') }}"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Zula Mclaughin</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div>
                                        <span class="avatar avatar-md brround cover-image"
                                            data-bs-image-src="{{ asset('assets/img/faces/4.jpg') }}"></span>
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold" data-bs-toggle="modal" data-bs-target="#chatmodel">
                                            Isidro Heide</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Sidebar-right-->

        <!-- Message Modal -->
        <div class="modal fade" id="chatmodel" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right chatbox" role="document">
                <div class="modal-content chat border-0">
                    <div class="card overflow-hidden mb-0 border-0">
                        <!-- action-header -->
                        <div class="action-header clearfix">
                            <div class="float-start hidden-xs d-flex ms-2">
                                <div class="img_cont me-3">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}" class="rounded-circle user_img"
                                        alt="img">
                                </div>
                                <div class="align-items-center mt-2">
                                    <h4 class="text-white mb-0 fw-semibold">Daneil Scott</h4>
                                    <span class="dot-label bg-success"></span><span
                                        class="me-3 text-white">online</span>
                                </div>
                            </div>
                            <ul class="ah-actions actions align-items-center">
                                <li class="call-icon">
                                    <a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal"
                                        data-bs-target="#audiomodal">
                                        <i class="si si-phone"></i>
                                    </a>
                                </li>
                                <li class="video-icon">
                                    <a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal"
                                        data-bs-target="#videomodal">
                                        <i class="si si-camrecorder"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="si si-options-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><i class="fa fa-user-circle"></i> View profile</li>
                                        <li><i class="fa fa-users"></i>Add friends</li>
                                        <li><i class="fa fa-plus"></i> Add to group</li>
                                        <li><i class="fa fa-ban"></i> Block</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" class="" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="si si-close text-white"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- action-header end -->

                        <!-- msg_card_body -->
                        <div class="card-body msg_card_body">
                            <div class="chat-box-single-line">
                                <abbr class="timestamp">February 1st, 2019</abbr>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you Jenna Side?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <div class="msg_cotainer_send">
                                    Hi Connor Paige i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <div class="msg_cotainer_send">
                                    You welcome Connor Paige
                                    <span class="msg_time_send">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Yo, Can you update Views?
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    But I must explain to you how all this mistaken born and I will give
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Yo, Can you update Views?
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    But I must explain to you how all this mistaken born and I will give
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Yo, Can you update Views?
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    But I must explain to you how all this mistaken born and I will give
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="rounded-circle user_img_msg" alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Okay Bye, text you later..
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                        </div>
                        <!-- msg_card_body end -->
                        <!-- card-footer -->
                        <div class="card-footer">
                            <div class="msb-reply d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control " placeholder="Typing....">
                                    <div class="input-group-text bg-transparent border-0 p-0">
                                        <button type="button" class="btn btn-primary ">
                                            <i class="far fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-footer end -->
                    </div>
                </div>
            </div>
        </div>

        <!--Video Modal -->
        <div id="videomodal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark border-0 text-white">
                    <div class="modal-body mx-auto text-center p-7">
                        <h5>Valex Video call</h5>
                        <img src="{{ asset('assets/img/faces/6.jpg') }}"
                            class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
                        <h4 class="mb-1 fw-semibold">Daneil Scott</h4>
                        <h6>Calling...</h6>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-video-slash"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle text-white mb-0 me-3"
                                        href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-phone bg-danger text-white"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-microphone-slash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-body -->
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Audio Modal -->
        <div id="audiomodal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body mx-auto text-center p-7">
                        <h5>Valex Voice call</h5>
                        <img src="{{ asset('assets/img/faces/6.jpg') }}"
                            class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
                        <h4 class="mb-1  fw-semibold">Daneil Scott</h4>
                        <h6>Calling...</h6>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-volume-up bg-light text-dark"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle text-white mb-0 me-3"
                                        href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-phone text-white bg-success"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape  rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-microphone-slash bg-light text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-body -->
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Footer opened -->
        <div class="main-footer ht-45">
            <div class="container-fluid pd-t-0 ht-100p">
                <span> Copyright © 2022 <a href="javascript:void(0);" class="text-primary">Valex</a>. Designed with
                    <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);">
                        {{ config('app.name') }} </a> All rights reserved.</span>
            </div>
        </div>
        <!-- Footer closed -->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <!-- JQuery min js -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('assets/plugins/chart.js') }}/Chart.bundle.min.js')}}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

    <!--Internal Sparkline js -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

    <!--Internal Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

    <!-- Rating js-->
    <script src="{{ asset('assets/plugins/ratings-2/jquery.star-rating.js') }}"></script>
    <script src="{{ asset('assets/plugins/ratings-2/star-rating.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!-- Eva-icons js -->
    <script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/modal-popup.js') }}"></script>

    <!-- Left-menu js-->
    <script src="{{ asset('assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!-- Internal Map -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <!--Internal  index js -->
    <script src="{{ asset('assets/js/index.js') }}"></script>

    <!--themecolor js-->
    <script src="{{ asset('assets/js/themecolor.js') }}"></script>

    <!-- Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-alert />

    {{-- <script>
        const userID = "{{ Auth::id() }}";
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts') --}}
</body>

</html>
