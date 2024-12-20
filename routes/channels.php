<?php

use App\Broadcasting\NewUserRegisteredChannel;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//private channel
Broadcast::channel('new_user_registered_channel', function ($user) {
    return true;
},['guards'=>['admin']]);

// Broadcast::channel('new_user_registered_channel', NewUserRegisteredChannel::class,['guards'=>['admin']]);
// //private channel


//presence channel
Broadcast::channel('admin_room_channel', function ($user) {
    return [
        'id'=>$user->id,
        'name'=>$user->name,
    ];
},['guards'=>['admin']]);
