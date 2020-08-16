<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth', 'middleware' => 'nocache'],function(){
Route::middleware('auth:api')->get('/staff', function (Request $request) {
    return $request->user();
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/staff/register', function () {
    return view('pages.register');
});
Route::get('/staff/{id}/update', function () {
    return view('pages.update');
});
Route::get('/no_permission', function () {
    return view('admin.no_permission');
});
Route::get('/staff', 'StaffController@getAllStaff')->middleware('auth');
Route::get('/staff/{id}', 'StaffController@getStaff')->middleware('auth');
Route::post('/staff', 'StaffController@createStaff')->middleware('auth');
Route::put('/staff/{id}', 'StaffController@updateStaff')->name("update_staff_data")->middleware('auth');
Route::delete('/staff/{id}','StaffController@deleteStaff')->middleware('auth');

Route::post('/staff/avatar', 'StaffController@uploadAvie')->middleware('auth');

//messages
Route::get('/inbox', 'MessageController@index')->middleware('auth');
Route::get('/{id}/inbox', 'MessageController@getMessages')->middleware('auth')->middleware('nocache');
Route::get('/{id}/message', 'MessageController@getAmessage')->middleware('auth');
Route::post('/send', 'MessageController@sendMessage')->middleware('auth');
Route::post('/send/message', 'MessageController@sendAdminMessage')->middleware('auth');
Route::get('/reply/{id}/index', 'ReplyController@index')->middleware('auth');
Route::post('/reply/{id}/store','ReplyController@store')->name('reply.add')->middleware('auth');
Route::get('/edit/{id}/message','MessageController@editMessage')->name('edit.msg')->middleware('auth');
Route::put('/update/{id}/message','MessageController@updateMessage')->name('update.msg')->middleware('auth');
Route::delete('/delete/{id}/message','MessageController@deleteMessage')->name('delete.msg')->middleware('auth');

//hod
Route::get('/hod/{id}/staff_list', 'AdminController@getDeptStaff')->name('hod.staff_list')->middleware('auth');
Route::get('/hod/{id}/staff', 'StaffController@getStaff')->name('hod.staff')->middleware('auth');
Route::get('/hod/{id}/message', 'MessageController@hodIndex')->name('hod.view_message')->middleware('auth');
Route::post('/hod/{id}/send', 'MessageController@hodMessage')->name('hod.message')->middleware('auth');

//unithead
Route::get('/unithead/{id}/staff_list', 'AdminController@getUnitStaff')->name('hod.staff_list')->middleware('auth');
Route::get('/unithead/{id}/staff', 'StaffController@getStaff')->name('hod.staff')->middleware('auth');
Route::get('/unithead/{id}/message', 'MessageController@hodIndex')->name('hod.view_message')->middleware('auth');

//admin
Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::get('/admin/{id}/inbox', 'MessageController@getMessages')->middleware('admin');
Route::get('/admin/{id}/admin','AdminController@makeAdmin')->middleware('admin');
Route::get('/admin/{id}/remove_admin','AdminController@removeAdmin')->middleware('admin');
Route::get('/admin/{id}/hod','AdminController@makeHod')->middleware('admin');
Route::get('/admin/{id}/remove_hod','AdminController@removeHod')->middleware('admin');
Route::get('/admin/{id}/unithead', 'AdminController@makeUnitHead')->middleware('admin');
Route::get('/admin/{id}/remove_unit_head','AdminController@removeUnitHead')->middleware('admin');
Route::post('/admin/inbox', 'MessageController@sendAdminMessage')->middleware('admin');
Route::get('/admin/user', 'AdminController@getUsers')->name('admin.user_list')->middleware('admin');
Route::get('/admin/staff', 'AdminController@getStaff')->name('admin.staff_list')->middleware('admin');
Route::get('/admin/{id}/staff', 'AdminController@getAStaff')->name('admin.staff_data')->middleware('admin');
});

//notice board
Route::resource('notice', 'NoticeController');

//reset password
Route::get('/password/reset','Auth\ResetPasswordController@create');
Route::post('/password/reset','Auth\ResetPasswordController@store')->name('reset.password.store');