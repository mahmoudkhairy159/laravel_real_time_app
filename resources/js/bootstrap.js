/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;
console.log('import.meta.env:', import.meta.env.VITE_PUSHER_APP_KEY);

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

console.log('Initializing Laravel Echo...');
// public channel
// window.Echo.channel('new_user_registered_channel')
//     .listen('.new-user-registered-event', (data) => {
//         console.log('Broadcast received:', data);

//         // Update notification count
//         const notificationCountElement = document.querySelector('.notificationIcon .dot');
//         let currentCount = parseInt(notificationCountElement.textContent.trim()) || 0;
//         notificationCountElement.textContent = currentCount + 1;

//         // Add new notification dynamically
//         const notificationList = document.querySelector('.list-group');
//         const newNotificationHTML = `
//             <div class="list-group-item bg-light">
//                 <div class="row align-items-center">
//                     <div class="col-auto">
//                         <span class="fe fe-box fe-24"></span>
//                     </div>
//                     <div class="col">
//                         <small><strong>${data.title ?? 'New Notification'}</strong></small>
//                         <div class="my-0 text-muted small">
//                             ${data.message ?? 'No message available'}
//                         </div>
//                         <small class="badge badge-pill badge-light text-muted">
//                             Just now
//                         </small>
//                     </div>
//                 </div>
//             </div>
//         `;
//         notificationList.insertAdjacentHTML('afterbegin', newNotificationHTML);
//     });






//private channel
window.Echo.private('new_user_registered_channel')
    .listen('.new-user-registered-event', (data) => {
        console.log('Broadcast received:', data);

        // Update notification count
        const notificationCountElement = document.querySelector('.notificationIcon .dot');
        let currentCount = parseInt(notificationCountElement.textContent.trim()) || 0;
        notificationCountElement.textContent = currentCount + 1;

        // Add new notification dynamically
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








//presence channel
window.Echo.join(`admin_room_channel`)
    .here((users) => {
        console.log('here');
        console.log(users);
    })
    .joining((user) => {
        console.log('joining');
        console.log(user.name);
    })
    .leaving((user) => {
        console.log('leaving');
        console.log(user.name);
    })
    .error((error) => {
        console.log('error');
        console.error(error);
    });
