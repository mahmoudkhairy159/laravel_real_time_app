@stack('scripts')

<script src="{{ asset('assets') }}/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets') }}/js/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/moment.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/simplebar.min.js"></script>
<script src='{{ asset('assets') }}/js/daterangepicker.js'></script>
<script src='{{ asset('assets') }}/js/jquery.stickOnScroll.js'></script>
<script src="{{ asset('assets') }}/js/tinycolor-min.js"></script>
<script src="{{ asset('assets') }}/js/config.js"></script>
<script src="{{ asset('assets') }}/js/d3.min.js"></script>
<script src="{{ asset('assets') }}/js/topojson.min.js"></script>
<script src="{{ asset('assets') }}/js/datamaps.all.min.js"></script>
<script src="{{ asset('assets') }}/js/datamaps-zoomto.js"></script>
<script src="{{ asset('assets') }}/js/datamaps.custom.js"></script>
<script src="{{ asset('assets') }}/js/Chart.min.js"></script>
<script src="{{ asset('assets') }}/js/gauge.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.sparkline.min.js"></script>
<script src="{{ asset('assets') }}/js/apexcharts.min.js"></script>
<script src="{{ asset('assets') }}/js/apexcharts.custom.js"></script>
<script src='{{ asset('assets') }}/js/jquery.mask.min.js'></script>
<script src='{{ asset('assets') }}/js/select2.min.js'></script>
<script src='{{ asset('assets') }}/js/jquery.steps.min.js'></script>
<script src='{{ asset('assets') }}/js/jquery.validate.min.js'></script>
<script src='{{ asset('assets') }}/js/jquery.timepicker.js'></script>
<script src='{{ asset('assets') }}/js/dropzone.min.js'></script>
<script src='{{ asset('assets') }}/js/uppy.min.js'></script>
<script src='{{ asset('assets') }}/js/quill.min.js'></script>
<script>
    $(document).ready(function() {
        // When the notification icon is clicked
        $('.notificationIcon').on('click', function() {
            $.ajax({
                url: '{{ route('admin.notifications.read_all') }}', // Laravel route to mark notifications as read
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token
                },
                success: function(response) {
                    // Update the UI: reset unread notifications count
                    $('.dot').text(''); // Reset unread notification count
                    // Change the background color of unread notifications in the modal
                    $('.list-group-item.bg-light').removeClass('bg-light').addClass(
                        'bg-transparent');
                },
                error: function(xhr) {
                    console.log('Error marking notifications as read');
                }
            });
        });
    });
    $(document).ready(function() {
    // When the "Clear All" button is clicked
    $('.clearAllbtn').on('click', function() {
        $.ajax({
            url: '{{ route('admin.notifications.delete_all') }}',  // Laravel route to delete all notifications
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  // CSRF token
            },
            success: function(response) {
                // Clear notifications from the UI
                $('.list-group').html('<p>No notifications available.</p>');  // Optionally clear the modal body
                $('.dot').text('');  // Reset unread notification count
            },
            error: function(xhr) {
                console.log('Error deleting notifications:', xhr.responseText);
            }
        });
    });
});

</script>
