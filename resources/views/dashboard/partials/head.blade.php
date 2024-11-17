<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/feather.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/select2.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/dropzone.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/uppy.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.steps.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.timepicker.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app-dark.css" id="darkTheme" disabled>
    @stack('styles')

    <!-- Pusher-->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('9f3efc6359fe8387db7d', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('new_user_registered_channel');
        channel.bind('new-user-registered-event', function(data) {
            console.log('Event received:', data);

            // Increment notification count
            const notificationCountElement = document.querySelector('.notificationIcon .dot');
            let currentCount = parseInt(notificationCountElement.textContent.trim()) || 0;
            notificationCountElement.textContent = currentCount + 1;

            // Add the new notification to the notifications list
            const notificationList = document.querySelector('.list-group');
            const newNotificationHTML = `
    <div class="list-group-item bg-light">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="fe fe-box fe-24"></span>
            </div>
            <div class="col">
                <small><strong>${data.title ?? 'New Notification'}</strong></small>
                <div class="my-0 text-muted small">
                    ${data.message ?? 'No message available'}
                </div>
                <small class="badge badge-pill badge-light text-muted">
                    Just now
                </small>
            </div>
        </div>
    </div>
`;
            notificationList.insertAdjacentHTML('afterbegin', newNotificationHTML);
        });
    </script>
    <!-- Pusher-->

</head>
