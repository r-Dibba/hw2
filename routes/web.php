<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('signup', 'App\Http\Controllers\SignupController@signup_form');
Route::post('signup', 'App\Http\Controllers\SignupController@signup');

Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@login');

Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('home', 'App\Http\Controllers\HomeController@show_home');

Route::get('user_profile/{clicked?}', 'App\Http\Controllers\ProfileController@show_profile');

Route::get('chat', 'App\Http\Controllers\ChatController@show_chat');

Route::get('post', 'App\Http\Controllers\PostController@show_post');

Route::get('events', 'App\Http\Controllers\EventsController@show_events');

Route::get('search_users', 'App\Http\Controllers\UsersController@show_users');


Route::get('currentuser', 'App\Http\Controllers\UserdataApi@get_userdata');

Route::get('notifications/{type}', 'App\Http\Controllers\NotifApi@get_notifications');

Route::get('getevents/{type}/{filter}/{page}', 'App\Http\Controllers\EventsApi@get_events');

Route::get('signup_validation/{type}/{tocheck}', 'App\Http\Controllers\AccessApi@signup_validation');

Route::get('searchusers/like/{tosearch}/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@get_users');
Route::get('searchusers/is-followed/{tosearch}', 'App\Http\Controllers\SearchUsersApi@is_user_followed');
Route::get('searchusers/followed-by/{usershown}/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@user_followers');
Route::get('searchusers/follows/{usershown}/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@user_followed');
Route::get('searchusers/like-chat/{tosearch}/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@get_users_chat');
Route::get('searchusers/follows-chat/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@users_followed_chat');
Route::get('searchusers/followed-by-chat/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@users_followers_chat');
Route::get('searchusers/unread/{limit}/{offset}', 'App\Http\Controllers\SearchUsersApi@users_unread');


Route::get('followers/{type}/{target}', 'App\Http\Controllers\FollowersApi@follower_interaction');

Route::post('update_profile/upload_propic', 'App\Http\Controllers\ProfileUpdateApi@upload_propic');
Route::post('update_profile/update_motto', 'App\Http\Controllers\ProfileUpdateApi@update_motto');

Route::get('getalbum/{title}/{artist}', 'App\Http\Controllers\PostApi@get_album');
Route::post('addpost/0', 'App\Http\Controllers\PostApi@add_review');
Route::post('addpost/1', 'App\Http\Controllers\PostApi@add_post');
Route::get('retrieveposts/target/{targetuser}/{limit}/{offset}', 'App\Http\Controllers\PostApi@retrieve_posts_target');
Route::get('retrieveposts/friends/{limit}/{offset}', 'App\Http\Controllers\PostApi@retrieve_posts_friends');

Route::get('postinteractions/upvote/{target}', 'App\Http\Controllers\PostApi@set_upvote');
Route::get('postinteractions/downvote/{target}', 'App\Http\Controllers\PostApi@set_downvote');
Route::post('postinteractions/comment', 'App\Http\Controllers\PostApi@comment_post');
Route::get('postinteractions/delete/{target}', 'App\Http\Controllers\PostApi@delete_interaction');
Route::get('postinteractions/load-comments/{target}', 'App\Http\Controllers\PostApi@load_comments');

Route::get('chat/load-conv/{target}', 'App\Http\Controllers\ChatApi@load_conv');
Route::post('chat/send-msg', 'App\Http\Controllers\ChatApi@send_msg');
Route::get('chat/listen/{target}', 'App\Http\Controllers\ChatApi@listen');
Route::get('chat/mark-as-read/{target}', 'App\Http\Controllers\ChatApi@mark_as_read');




