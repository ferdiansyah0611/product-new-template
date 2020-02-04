<?php

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
Auth::routes();
Route::get('logins', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registrations', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('logout2', 'AuthController@logouts')->name('log');
Route::get('/', 'HomeController@index');
Route::get('/home', 'ProductionController@index')->name('home');
Route::resource('/production', 'ProductionController');
//Route::resource('/dashboard', 'DashboardController');
//Route::resource('/messages', 'MessagesController');
Route::resource('/products', 'ProductAjaxController');


Route::get('/templates/notifAll', 'DashboardController@notifAll');
Route::get('/templates/notifMessages', 'DashboardController@notifMessages');
//Dashboard page
Route::group(['prefix'=>'dashboards','as'=>'dashboard.'], function(){
     Route::get('/', 'DashboardController@index')->name('index');
     Route::post('/category/added', 'DashboardController@new_category')->name('newcategory');
     Route::delete('/category/delete/{category}', 'DashboardController@delete_category')->name('deletecategory');
     Route::get('/category/{category}', 'DashboardController@edit_category')->name('editcategory');
     Route::post('/category/update/{category}', 'DashboardController@update_category')->name('updatecategory');
     Route::get('/manage/users', 'DashboardController@manage_users')->name('manageusers');
     Route::get('/manage/users/for', 'DashboardController@search_user')->name('searchmanageuser');
     Route::post('/manage/users/updating/{user}', 'DashboardController@update_users')->name('updateusers');
     Route::get('/manage/database', 'DashboardController@manage_database')->name('managedb');
     Route::delete('/notification/delete', 'DashboardController@delete_all_notification')->name('deleteallnotification');
     Route::post('/manage/database/savesize/{production}', 'DashboardController@save_size')->name('dbsavesize');
     Route::post('/saldo/random', 'DashboardController@random_saldo')->name('randomsaldo');

     	Route::get('/purchaseIndex', 'DashboardController@purchaseIndex');
     	Route::get('/topDashboard', 'DashboardController@topDashboard');
     	Route::get('/categoryIndex', 'DashboardController@categoryIndex');
 });
//Messages page
Route::group(['prefix'=>'message','as'=>'messages.'], function(){
     Route::get('/messages/archives', 'MessagesController@archive')->name('archived');
     Route::get('/messages', 'MessagesController@index')->name('index');
     Route::get('/messages/inbox', 'MessagesController@index')->name('inbox');
     Route::get('/messages/create', 'MessagesController@create')->name('create');
     Route::get('/messages/{messages}', 'MessagesController@show')->name('show');
     Route::delete('/messages/delete/{messages}', 'MessagesController@destroy')->name('deletemessages');
     Route::post('/messages/readdata/{messages}', 'MessagesController@read_message')->name('read');
     Route::post('messages/savedata', 'MessagesController@store')->name('store');
     Route::post('/messages/beforeread/{messages}', 'MessagesController@before_message')->name('before');
 });
//Productions page
Route::group(['production'=>'production','as'=>'productions.'], function(){
     Route::get('/productions/', 'ProductionController@index')->name('index');
     Route::get('/productions/create', 'ProductionController@create')->name('create');
     Route::post('/productions/store', 'ProductionController@store')->name('store');
     Route::get('/productions/manage/{production}/edit/{any}', 'ProductionController@edit')->name('edit');
     Route::post('/productions/update/{production}', 'ProductionController@update')->name('update');
     Route::delete('/productions/destroy/{production}', 'ProductionController@destroy')->name('destroy');
     Route::get('/productions/manage', 'ProductionController@manage')->name('manage');
     Route::get('/productions/{production}/views', 'ProductionController@show')->name('show');
     	Route::get('/productions/{production}/views/ref', 'ProductionController@showRef')->name('showRef');
     Route::get('/productions/{production}/views/filtering-data', 'ProductionController@filtering_question')->name('filtering_star');
     Route::get('/productions/for', 'ProductionController@search')->name('search');
     Route::get('/productions/manage/for', 'ProductionController@search_manage')->name('searchmanage');
     Route::get('/productions/draft-products', 'ProductionController@draft')->name('draft');
     Route::post('/productions/questions', 'ProductionController@save_question')->name('question');
     Route::delete('/productions/questions/delete/{question}', 'ProductionController@delete_question')->name('delete');
     Route::post('/productions/questions/likes', 'ProductionController@like_question')->name('likequestion');
     Route::get('/productions/category/view-for', 'ProductionController@category')->name('category');
     Route::post('/productions/buy/{production}', 'ProductionController@buy')->name('buy');
     Route::post('/productions/isisaldo', 'ProductionController@isi_saldo')->name('isisaldo');
     Route::get('/productions/top-up', 'ProductionController@topup')->name('topup');
     Route::get('/productions/request-for-my-product', 'ProductionController@view_request_products')->name('request');
     Route::get('/productions/my-cart', 'ProductionController@view_cart')->name('viewcart');
     Route::get('/productions/payment', 'ProductionController@cardPay')->name('payment');
 });
//Profile page
Route::group(['prefix'=>'profiles','as'=>'profile.'], function(){
     Route::get('/profiles/create', 'ProfileController@create')->name('create');
     Route::get('/profiles/views/{profile}', 'ProfileController@show')->name('show');
     Route::get('/profiles/views/me/{profile}', 'ProfileController@me')->name('me');
     Route::post('/profiles/update/{profile}', 'ProfileController@update')->name('update');
     Route::post('/profiles/create/new-data', 'ProfileController@store')->name('store');
     Route::get('/profiles/{profile}/edit', 'ProfileController@edit')->name('edit');
     Route::post('/profiles/views/like', 'ProfileController@like')->name('like');
 });
//Setting page
Route::group(['settings'=>'settings','as'=>'setting.'], function(){
     Route::get('/settings/accounts', 'ProfileController@set_account')->name('account');
     Route::post('/settings/accounts/{user}', 'ProfileController@update_account')->name('update');
     Route::get('/settings/display', 'ProfileController@display_set')->name('display');
     Route::post('/settings/display', 'ProfileController@display_store')->name('storedisplay');
     Route::delete('/settings/delete/history', 'ProfileController@delete_history_login')->name('deleteHistory');
     Route::get('/preview', 'ProfileController@preview')->name('preview');
     Route::get('/settings/history-login','ProfileController@view_history')->name('history');
     Route::post('/change-languange', 'ProfileController@changeLang')->name('changelang');
 });
Route::get('/purchase/pending', 'ProfileController@pending')->name('purchase.pending');
Route::get('/purchase/receive', 'ProfileController@receive')->name('purchase.receive');
Route::group(['prefix'=>'abouts','as'=>'about.'], function(){
     Route::get('/about/privacy-policy', 'DashboardController@privacy')->name('privacy');
     Route::get('/about/community', 'DashboardController@community')->name('community');
     Route::get('/about/disclaimer', 'DashboardController@disclaimer')->name('disclaimer');
     Route::get('/about/programming', 'DashboardController@programming')->name('programming');
 });
Route::get('/documentation', 'HomeController@spa');
Route::get('/template', 'HomeController@templates');
Route::get('redirect/{driver}', 'AuthController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'AuthController@handleProviderCallback')->name('login.callback');