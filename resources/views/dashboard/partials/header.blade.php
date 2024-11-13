<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">

       {{-- Notification --}}
<li class="nav-item nav-notif">
    <a class="nav-link text-muted my-2 notificationIcon" href="./#" data-toggle="modal" data-target=".modal-notif">
        <span class="fe fe-bell fe-16"></span>
        <span class="dot dot-md text-danger">
            @if (Auth::guard('admin')->check())
                {{ Auth::guard('admin')->user()->unreadNotifications->count()>0??'' }}
            @endif
        </span>
    </a>
</li>

{{-- Notification Modal --}}
<div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->notifications)
                        @foreach (Auth::guard('admin')->user()->notifications->take(5) as $notification)
                            <div class="list-group-item @if ($notification->unread()) bg-light @else bg-transparent @endif">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>{{ $notification->data['title'] ?? 'New Notification' }}</strong></small>
                                        <div class="my-0 text-muted small">
                                            {{ $notification->data['message'] ?? 'No message available' }}
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No notifications available.</p>
                    @endif
                </div> <!-- / .list-group -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block clearAllbtn" data-dismiss="modal">Clear All</button>
            </div>
        </div>
    </div>
</div>

{{-- Notification --}}













        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset('assets') }}/images/avatar.png" alt="Profile image"
                        class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent p-0 text-danger">
                        <span key="t-logout">{{ __('lang.logout') }}</span>
                    </button>
                </form>

            </div>
        </li>

    </ul>
</nav>

