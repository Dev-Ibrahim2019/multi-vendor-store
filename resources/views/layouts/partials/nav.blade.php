<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img src="{{asset('assets/img/brand/logo.png')}}"
                class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img src="{{asset('assets/img/brand/logo-white.png')}}"
                class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{asset('assets/img/brand/favicon.png')}}"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                src="{{asset('assets/img/brand/favicon-white.png')}}" alt="logo"></a>
        {{-- <a href="#" class="desktop-logo logo-light active main-logo fs-4">{{ config('app.name') }}</a> --}}
    </div>
    <div class="main-sidemenu">
        @auth
            <div class="app-sidebar__user clearfix">
                <div class="dropdown user-pro-body">
                    <div class="">
                        <img alt="user-img" class="avatar avatar-xl brround" src="{{asset('assets/img/faces/6.jpg')}}"><span
                            class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="user-info">
                        <h4 class="fw-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                        <span class="mb-0 text-muted">Premium Member</span>
                    </div>
                </div>
            </div>
        @endauth
        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
            </svg></div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="index.html"><svg xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">Index</span><span class="badge bg-success text-light"
                        id="bg-side-text">1</span></a>
            </li>
            <li class="side-item side-item-category">General</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                            opacity=".3" />
                        <circle cx="15.5" cy="9.5" r="1.5" />
                        <circle cx="8.5" cy="9.5" r="1.5" />
                        <path
                            d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                    </svg><span class="side-menu__label">Icons</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li class="side-menu__label1"><a href="javascript:void(0);">Icons</a></li>
                    <li><a class="slide-item" href="icons.html">Font Awesome </a></li>
                    <li><a class="slide-item" href="icons-2.html">Material Design Icons</a></li>
                    <li><a class="slide-item" href="icons-3.html">Simple Line Icons</a></li>
                    <li><a class="slide-item" href="icons-4.html">Feather Icons</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg><span class="side-menu__label">Charts</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li class="side-menu__label1"><a href="javascript:void(0);">Charts</a></li>
                    <li><a class="slide-item" href="chart-morris.html">Morris Charts</a></li>
                    <li><a class="slide-item" href="chart-flot.html">Flot Charts</a></li>
                </ul>
            </li>
            <li class="side-item side-item-category">WEB APPS</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                    </svg><span class="side-menu__label">Apps</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li class="side-menu__label1"><a href="javascript:void(0);">Apps</a></li>
                    <li><a class="slide-item" href="cards.html">Cards</a></li>
                    <li><a class="slide-item" href="draggablecards.html">Draggablecards</a></li>
                    <li><a class="slide-item" href="widget-notification.html">Widget-notification</a>
                    </li>
                    <li><a class="slide-item" href="treeview.html">Treeview</a></li>
                    <li class="sub-slide">
                        <a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                class="sub-side-menu__label">File-Manager</span><i
                                class="sub-angle fe fe-chevron-down"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-side-menu__item" href="file-manager.html">File-Manager</a></li>
                            <li><a class="sub-side-menu__item" href="file-manager-list.html">File-Manager-List</a>
                            </li>
                            <li><a class="sub-side-menu__item"
                                    href="file-manager-details.html">File-Manager-Details</a></li>
                            <li><a class="sub-side-menu__item" href="file-attachments.html">File-Attachments</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
            </svg></div>
    </div>
</aside>
