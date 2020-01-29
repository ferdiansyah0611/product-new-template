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
//Dashboard page
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
Route::post('/dashboard/category/added', 'DashboardController@new_category')->name('dashboard.newcategory');
Route::delete('/dashboard/category/delete/{category}', 'DashboardController@delete_category')->name('dashboard.deletecategory');
Route::get('/dashboard/category/{category}', 'DashboardController@edit_category')->name('dashboard.editcategory');
Route::post('/dashboard/category/update/{category}', 'DashboardController@update_category')->name('dashboard.updatecategory');
Route::get('/dashboard/manage/users', 'DashboardController@manage_users')->name('dashboard.manageusers');
Route::get('/dashboard/manage/users/for', 'DashboardController@search_user')->name('dashboard.searchmanageuser');
Route::post('/dashboard/manage/users/updating/{user}', 'DashboardController@update_users')->name('dashboard.updateusers');
Route::get('/dashboard/manage/database', 'DashboardController@manage_database')->name('dashboard.managedb');
Route::delete('/dashboard/notification/delete', 'DashboardController@delete_all_notification')->name('dashboard.deleteallnotification');
Route::post('/dashboard/manage/database/savesize/{production}', 'DashboardController@save_size')->name('dashboard.dbsavesize');
Route::post('/dashboard/saldo/random', 'DashboardController@random_saldo')->name('dashboard.randomsaldo');
//Delete messages
Route::get('/messages/archives', 'MessagesController@archive')->name('messages.archived');
Route::get('/messages', 'MessagesController@index')->name('messages.index');
Route::get('/messages/create', 'MessagesController@create')->name('messages.create');
Route::get('/messages/{messages}', 'MessagesController@show')->name('messages.show');
Route::delete('/messages/delete/{messages}', 'MessagesController@destroy')->name('messages.deletemessages');
Route::post('/messages/readdata/{messages}', 'MessagesController@read_message')->name('messages.read');
Route::post('messages/savedata', 'MessagesController@store')->name('messages.store');
Route::post('/messages/beforeread/{messages}', 'MessagesController@before_message')->name('messages.before');
//Productions page
Route::get('/productions', 'ProductionController@index')->name('productions.index');
Route::get('/productions/create', 'ProductionController@create')->name('productions.create');
Route::post('/productions/store', 'ProductionController@store')->name('productions.store');
Route::get('/productions/manage/{production}/edit/{any}', 'ProductionController@edit')->name('productions.edit');
Route::post('/productions/update/{production}', 'ProductionController@update')->name('productions.update');
Route::delete('/productions/destroy/{production}', 'ProductionController@destroy')->name('productions.destroy');
Route::get('/productions/manage', 'ProductionController@manage')->name('productions.manage');
Route::get('/productions/{production}/views/{name_products}/{views}', 'ProductionController@show')->name('productions.show');
Route::get('/productions/{production}/views/filtering-data', 'ProductionController@filtering_question')->name('productions.filtering_star');
Route::get('/productions/for', 'ProductionController@search')->name('productions.search');
Route::get('/productions/manage/for', 'ProductionController@search_manage')->name('productions.searchmanage');
Route::get('/productions/draft-products', 'ProductionController@draft')->name('production.draft');
Route::post('/productions/questions', 'ProductionController@save_question')->name('productions.question');
Route::delete('/productions/questions/delete/{question}', 'ProductionController@delete_question')->name('productions.delete');
Route::post('/productions/questions/likes', 'ProductionController@like_question')->name('productions.likequestion');
Route::get('/productions/category/view-for', 'ProductionController@category')->name('productions.category');
Route::post('/productions/buy/{production}', 'ProductionController@buy')->name('productions.buy');
Route::post('/productions/isisaldo', 'ProductionController@isi_saldo')->name('production.isisaldo');
Route::get('/productions/top-up', 'ProductionController@topup')->name('productions.topup');
Route::get('/productions/my-cart', 'ProductionController@view_cart')->name('productions.viewcart');
Route::get('/productions/request-for-my-product', 'ProductionController@view_request_products')->name('productions.request');
 //end production
//Profile page
Route::get('/profiles/create', 'ProfileController@create')->name('profile.create');
Route::get('/profiles/views/{profile}', 'ProfileController@show')->name('profile.show');
Route::get('/profiles/views/me/{profile}', 'ProfileController@me')->name('profile.me');
Route::post('/profiles/update/{profile}', 'ProfileController@update')->name('profile.update');
Route::post('/profiles/create/new-data', 'ProfileController@store')->name('profile.store');
Route::get('/profiles/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/profiles/views/like', 'ProfileController@like')->name('profile.like');
//end profiles
//setting page
Route::get('/settings/accounts', 'ProfileController@set_account')->name('setting.account');
Route::post('/settings/accounts/{user}', 'ProfileController@update_account')->name('setting.update');
Route::get('/settings/display', 'ProfileController@display_set')->name('setting.display');
Route::post('/settings/display', 'ProfileController@display_store')->name('setting.storedisplay');
Route::delete('/settings/delete/history', 'ProfileController@delete_history_login')->name('setting.deleteHistory');
Route::get('/preview', 'ProfileController@preview');
Route::get('/settings/history-login','ProfileController@view_history')->name('setting.history');
//end setting
Route::get('/purchase/pending', 'ProfileController@pending')->name('purchase.pending');
Route::get('/purchase/receive', 'ProfileController@receive')->name('purchase.receive');
//end purchase
//about page
Route::get('/about/privacy-policy', 'DashboardController@privacy')->name('about.privacy');
Route::get('/about/community', 'DashboardController@community')->name('about.community');
Route::get('/about/disclaimer', 'DashboardController@disclaimer')->name('about.disclaimer');
Route::get('/about/programming', 'DashboardController@programming')->name('about.programming');
//end about
/*Route::get('/products/{any}', function($any){
     $url = base64_decode($any);
     //redirect according to $url ... for example "api/test/"
     return redirect( '/productions/'.$url );
});*/
Route::get('/documentation', 'HomeController@spa');
//Route::get('/{any}', 'HomeController@spa')->where('any', '.*');
Route::get('/template', 'HomeController@templates');