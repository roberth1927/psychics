<?php

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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('privatechat.{receiverId}', function ($user,$receiverId) {
    return \Illuminate\Support\Facades\Auth::check();
});

Broadcast::channel('privatevideo.{receiverId}', function ($user,$receiverId) {
    return \Illuminate\Support\Facades\Auth::check();
});

Broadcast::channel('privatereading.{user_id}', function ($user_id) {
    return \Illuminate\Support\Facades\Auth::check();
});

Broadcast::channel('online.users', function ($user) {
    if(\Illuminate\Support\Facades\Auth::check()){
        return $user;
    };
});

Broadcast::channel('online.user', function ($user) {
    return true;
});
