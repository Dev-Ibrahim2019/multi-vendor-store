<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('assets/img/brand/logo.png') }}"
                class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img
                src="{{ asset('assets/img/brand/logo-white.png') }}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img
                src="{{ asset('assets/img/brand/favicon.png') }}" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                src="{{ asset('assets/img/brand/favicon-white.png') }}" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        @auth
            <div class="app-sidebar__user clearfix">
                <div class="dropdown user-pro-body">
                    <div class="">
                        <img alt="user-img" class="avatar avatar-xl brround"
                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"><span
                            class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="user-info">
                        <h4 class="fw-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                        <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>
        @endauth
        <div class="slide-left disabled" d="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
            </svg>
        </div>
            <ul class="side-menu">
                @foreach ($items as $item)
                    @if (isset($item['title']))
                        <li class="side-item side-item-category">{{ $item['title'] }}</li>
                    @endif
                    <li class="slide"i>
                    <a class="side-menu__item" @if (isset($item['list'])) data-bs-toggle="slide" @endif
                        href="{{ !isset($item['list']) ? route('dashboard.dashboard') : 'javascript:void(0);' }}"> <i
                            class="{{ $item['icon'] }} side-menu__icon"></i><span
                            class="side-menu__label">{{ $item['main-title'] }}</span>
                        @if (isset($item['list']))
                            <i class="angle fe fe-chevron-down"></i>
                        @endif
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">{{ $item['main-title'] }}</a></li>
                        @if (isset($item['list']))
                            @for ($i = 0; $i < count($item['list']); $i++)
                                <li><a class="slide-item" href="{{ route($item['route'][$i]) }}">
                                        {{ $item['list'][$i] }} </a></li>
                            @endfor
                        @endif
                    </ul>
                </li>
            @endforeach
        </ul>
        <div class="slide-right" id="slide-right">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
            </svg>
        </div>
    </div>
</aside>
