<li class="dropdown nav-item main-header-notification">
    <a class="new nav-link" href="javascript:void(0);">
        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs position-relative" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        @if ($newCount)
            <span class=" pulse"></span>
        @endif
    </a>
    <div class="dropdown-menu">
        @if ($newCount)
            <div class="menu-header-content bg-primary text-start">
                {{-- <div class="d-flex">
                    <h6 class="dropdown-title mb-1 tx-15 text-white fw-semibold">Notifications</h6>
                    <span class="badge rounded-pill bg-warning ms-auto my-auto float-end">Mark All Read</span>
                </div> --}}
                <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have {{ $newCount }}
                    unread Notifications</p>
            </div>
        @endif
        <div class="main-notification-list Notification-scroll ps">
            @forelse ($notifications as $notification)
                <a class="d-flex p-3 border-bottom"
                    href="{{ $notification->data['url'] }}?notification_id={{ $notification->id }}">
                    <div class="notifyimg bg-success">
                        <i class="{{ $notification->data['icon'] }} text-light"></i>
                    </div>
                    <div class="ms-3 @if ($notification->unread()) fw-bold @endif">
                        <h5 class="notification-label mb-1">{{ $notification->data['body'] }}</h5>
                        <div class="notification-subtext">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="ms-auto">
                        <i class="las la-angle-right text-end text-muted"></i>
                    </div>
                </a>
            @empty
                <div class="menu-header-content bg-primary text-start">
                    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">Thair is No Notifications
                    </p>
                </div>
            @endforelse
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
        {{-- <div class="dropdown-footer">
            <a href="">VIEW ALL</a>
        </div> --}}
    </div>
</li>
