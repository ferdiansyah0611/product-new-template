<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|cd c:/wamp64/www/product2
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/test','Admin\ApiController@test');
Route::post('/testupload','Admin\ApiController@testUpload');
Route::get('logins', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registrations', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('logout2', 'AuthController@logouts')->name('log');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'ProductionController@index')->name('home');


Route::get('/templates/notifAll', 'DashboardController@notifAll');
Route::get('/templates/notifMessages', 'DashboardController@notifMessages');
//Messages page
Route::group(['prefix'=>'message','as'=>'messages.'], function(){
     Route::get('/archives', 'MessagesController@archive')->name('archived');
     Route::get('', 'MessagesController@index')->name('index');
     Route::get('/inbox', 'MessagesController@index')->name('inbox');
     Route::get('/create', 'MessagesController@create')->name('create');
     Route::get('/{messages}', 'MessagesController@show')->name('show');
     Route::delete('/delete/{messages}', 'MessagesController@destroy')->name('deletemessages');
     Route::post('/readdata/{messages}', 'MessagesController@read_message')->name('read');
     Route::post('messages/savedata', 'MessagesController@store')->name('store');
     Route::post('/beforeread/{messages}', 'MessagesController@before_message')->name('before');
 });
//Productions page
Route::group(['production'=>'production','as'=>'productions.'], function(){
     Route::get('/productions/views/{slug}', 'ProductionController@show2')->name('show');
     Route::get('/productions/draft-products', 'ProductionController@draft')->name('draft');
     Route::post('/productions/questions', 'ProductionController@save_question')->name('question');
     Route::delete('/productions/questions/delete/{question}', 'ProductionController@delete_question')->name('delete');
     Route::post('/productions/questions/likes', 'ProductionController@like_question')->name('likequestion');
     Route::get('/productions/category/view-for', 'ProductionController@category')->name('category');
     Route::post('/productions/buy/{production}', 'ProductionController@buy')->name('buy');
     Route::post('/productions/isisaldo', 'ProductionController@isi_saldo')->name('isisaldo');
     Route::get('/productions/top-up', 'ProductionController@topup')->name('topup');
     Route::get('/productions/payment', 'ProductionController@cardPay')->name('payment');
 });
//Profile page
Route::group(['profiles'=>'profiles','as'=>'profile.'], function(){
     Route::get('/profiles/create', 'ProfileController@create')->name('create');
     Route::get('/profiles/views', 'ProfileController@show')->name('show');
     Route::get('/profiles/views/{slug}', 'ProfileController@showProfile')->name('show2');
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
     Route::post('/settings/display/update', 'ProfileController@display_store')->name('storedisplay');
     Route::delete('/settings/delete/history', 'ProfileController@delete_history_login')->name('deleteHistory');
     Route::get('/preview', 'ProfileController@preview')->name('preview');
     Route::get('/settings/history-login','ProfileController@view_history')->name('history');
     Route::post('/change-languange', 'ProfileController@changeLang')->name('changelang');
     Route::post('/settings/read-all-notification', 'ProfileController@readallnotif');
     Route::get('/settings/preview','ProfileController@preview');
 });
Route::group(['prefix'=>'pay','as'=>'purchase.'],function(){
     Route::get('/pending', 'ProfileController@pending')->name('pending');
     Route::get('/receive', 'ProfileController@receive')->name('receive');
     Route::get('/management', 'ProfileController@latestPurchase')->name('manage');
     Route::get('/latestAPI', 'ProfileController@latestPurchaseAPI')->name('api_purchaselatest');
});
//about page
Route::group(['prefix'=>'abouts','as'=>'about.'], function(){
     Route::get('/about/privacy-policy', 'DashboardController@privacy')->name('privacy');
     Route::get('/about/community', 'DashboardController@community')->name('community');
     Route::get('/about/disclaimer', 'DashboardController@disclaimer')->name('disclaimer');
     Route::get('/about/programming', 'DashboardController@programming')->name('programming');
 });
//file  page
Route::group(['files'=>'files','as'=>'file.'], function(){
     Route::get('/files/word', 'FileController@viewWord')->name('viewword');
     Route::get('/files/excel', 'FileController@viewexcel')->name('viewexcel');
     Route::get('/files/powerpoint', 'FileController@viewPowerpoint')->name('viewpowerpoint');
     Route::get('/files/image', 'FileController@viewImage')->name('viewimage');
     Route::get('/files/video', 'FileController@viewVideo')->name('viewvideo');
     Route::post('/files/upload', 'FileController@uploadFile')->name('uploadfile');
     Route::post('/files/update', 'FileController@updateFiles')->name('updatefile');
     Route::delete('/files/delete-files', 'FileController@deleteFiles')->name('deletefile');

     //component page
     Route::get('/files/component/filewordID', 'FileController@file_managerWord');
     Route::get('/files/component/fileexcelID', 'FileController@file_managerExcel');
     Route::get('/files/component/filepowerpointID', 'FileController@file_managerPowerpoint');
     Route::get('/files/component/fileimageID', 'FileController@file_managerImage');
     Route::get('/files/component/filevideoID', 'FileController@file_managerVideo');
 });
//chatting page
Route::group(['chattings'=>'chattings','as'=>'chatting.'], function(){
	Route::get('/messages/chatting', 'MessagesController@chattingIndex')->name('chatting');
     Route::get('/messages/chatting/view/{email}','MessagesController@viewChatting');
	Route::post('/messages/sending', 'MessagesController@requestMessage')->name('senddata');
});
Route::group(['friends'=>'friends','as'=>'friend.'], function(){
	Route::post('/friend/invitation', 'SocialController@addFriends')->name('invite');
});
//Newseed page
Route::group(['prefix'=>'newseed','as'=>'newseeds.'], function(){
     Route::get('/', 'DashboardController@newseed')->name('index');
     Route::get('/create', 'DashboardController@newseedCreate')->name('create');
     Route::post('/store', 'DashboardController@newseedUpload')->name('store');
     Route::get('/view/{slug}', 'DashboardController@newseedShow')->name('show');
     Route::post('/delete/data', 'DashboardController@newseedDelete')->name('delete');
     //component
     Route::get('/component/create', 'DashboardController@newseedcreateCOMP')->name('compCreate');
 });

Route::group(['prefix'=>'api-get','as'=>'apiget.'],function(){
     Route::get('/product/management','Api\ApiAdminController@productManage')->name('admin_productManage');
     Route::get('/users/management','Api\ApiAdminController@usersManage')->name('admin_usersManage');
     Route::get('/my-product/management','Api\ApiUsersController@productManage')->name('pro_productManage');
     Route::get('/my-pay/management','Api\ApiUsersController@payManage')->name('pro_payManage');
});
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
     Route::group(['prefix'=>'api-admin','as'=>'api.'],function(){
          //api get
          Route::get('/get/apitop-dashboards', 'Admin\ApiController@TopDashboard')->name('topdashboards');
          Route::get('/get/product-manage', 'Admin\ApiController@productManage')->name('productmanage');
          Route::get('/get/users-manage', 'Admin\ApiController@usersManage')->name('usersmanage');
          Route::get('/get/category-manage', 'Admin\ApiController@DataCategory')->name('categorymanage');
          Route::get('/get/user-data/{id}', 'Admin\ApiController@GetUser')->name('getuser');
          Route::get('/get/product-data/{id}', 'Admin\ApiController@GetProduct')->name('getproduct');
          Route::get('/get/file', 'Admin\ApiController@DataFile')->name('fileimage');
          Route::get('/get/file/image', 'Admin\ApiController@FileImageGet')->name('getimage');
          Route::get('/get/category', 'Admin\ApiController@GetCategory')->name('getcategory');
          Route::get('/get/category/merk/data/{id}', 'Admin\ApiController@GetObjectDataMerk')->name('getcategorydatamerk');
          Route::get('/get/category/{id}', 'Admin\ApiController@GetObjectDataID')->name('getcategorydataid');
          Route::get('/get/category/{name}', 'Admin\ApiController@GetObjectData')->name('getcategorydata');
          Route::get('/get/category/{name}/{series}', 'Admin\ApiController@GetObjectDataFull')->name('getcategorydatafull');
          //api post
          Route::post('/post/users-update', 'Admin\ApiController@UpdateUser')->name('userupdate');
          Route::post('/post/category-new-data','Admin\ApiController@CreateDataCategory')->name('categorycreatedata');
          Route::post('/post/category-update/{category}','Admin\ApiController@UpdateCategory')->name('api_updatecategory');
          Route::post('/post/product-update','Admin\ApiController@UpdateProduction')->name('updateproduct');
          Route::post('/post/saldo-new-data','Admin\ApiController@CreateDataSaldo')->name('createdatasaldo');
          Route::delete('/post/users-delete/{id}', 'Admin\ApiController@DeleteUser')->name('api_userdelete');
          Route::delete('/post/category-delete/{id}', 'Admin\ApiController@DeleteCategory')->name('api_deletecategory');
          Route::delete('/post/product-delete/{id}', 'Admin\ApiController@DeleteProduct')->name('api_deleteproduct');
     });
     Route::group(['prefix'=>'request'],function(){
          //request
          Route::post('/post/create-users', 'Admin\RequestController@CreateRequestUser')->name('createusers');
          Route::post('/post/update-users/{user}', 'Admin\RequestController@UpdateUsers')->name('updateusers');
          Route::post('/post/create-saldo', 'Admin\RequestController@CreateRequestSaldo')->name('createsaldo');
          Route::post('/post/create-newseed', 'Admin\RequestController@CreateRequestNewseed')->name('createnewseed');
          Route::delete('/post/delete-newseed', 'Admin\RequestController@NewseedDelete')->name('deletenewseed');
          /*Route::post('/post/create-product', 'Admin\RequestController@CreateDataProduct')->name('createproduct');*/
          Route::post('/post/create-product', 'Admin\RequestController@CreateDataProduct')->name('createproduct');
          Route::post('/post/create-object','Admin\RequestController@CreateDataObject')->name('createobject');
          Route::post('/post/create-merk','Admin\RequestController@CreateDataMerk')->name('createmerk');
     });
     //view
     Route::get('/search','Admin\ApiController@SearchData')->name('searchdata');
     Route::get('/dashboards','Admin\ViewController@DashboardIndex')->name('dashboardindex');
     Route::get('/create-object','Admin\ViewController@CreateObject')->name('create_object');
          //management
     Route::get('/users-management', 'Admin\ViewController@UsersManagement')->name('users_management');
     Route::get('/product-management', 'Admin\ViewController@ProductManagement')->name('products_management');
     Route::get('/database-management', 'Admin\ViewController@DatabaseManagement')->name('database_management');
          //cart
     Route::get('/cart', 'Admin\ViewController@CartIndex')->name('cartindex');
     Route::group(['prefix'=>'product'],function(){
          Route::get('/create', 'Admin\ViewController@createProduct')->name('product_create');
          Route::get('/request', 'Admin\ViewController@RequestProducts')->name('product_request');
     });
     Route::group(['prefix'=>'newseed'],function(){
          Route::get('/create', 'Admin\ViewController@CreateNewseed')->name('newseed.create');
     });
});

Route::group(['prefix'=>'member','as'=>'member.'],function(){
     Route::group(['prefix'=>'api-member'],function(){
          //api post
          Route::get('/get/product-manage', 'Member\ApiController@productManage')->name('api_productmanage');
     });
     //view
     Route::get('/dashboards','Member\ViewController@DashboardIndex')->name('dashboardindex');
     Route::get('/product-management', 'Member\ViewController@ProductManagement')->name('products_management');
});

Route::get('/searching', 'HomeController@searching');
Route::get('/searching-users', 'HomeController@searchuser');
Route::get('/searching-product', 'HomeController@searchproduct');
Route::get('/documentation', 'HomeController@spa');
Route::get('/template', 'HomeController@templates');
Route::get('redirect/{driver}', 'AuthController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'AuthController@handleProviderCallback')->name('login.callback');

Route::get('payment', 'PaymentController@payment')->name('payment');
Route::get('cancel', 'PaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaymentController@success')->name('payment.success');

//API WITH AUTHENTICATE
Route::get('/categoryforAPI', 'ApiController@categoryAPI');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
'\vendor\uniSharp\LaravelFilemanager\Lfm::routes()';});