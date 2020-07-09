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

Route::get('/', 'HomeController@index')->name('mainhome');
Route::get('posts', 'PostController@index')->name('post.index');
Route::get('post/{slug}', 'PostController@details')->name('post.details');
Route::post('comment/{post}', 'CommentController@store')->name('comment.store');
Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

Route::get('/category/{slug}', 'PostController@postByCategory')->name('category.posts');
Route::get('/tag/{slug}', 'PostController@postByTag')->name('tag.posts');

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
	Route::post('favorite/{post}/add', 'FavoriteController@add')->name('post.favorite');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth','admin'] ],
		function(){
			Route::get('dashboard', 'DashboardController@index')->name('dashboard');
			//Setting Controller
			Route::get('setting', 'SettingController@index')->name('settings');
			Route::put('profile-update', 'SettingController@updateProfile')->name('profile.update');
			Route::put('password-update', 'SettingController@updatePassword')->name('password.update');

			Route::resource('/tag','TagController');
			Route::resource('/category','CategoryController');
			Route::resource('/post','PostController');
			//Approved
			Route::get('pending/post', 'PostController@pending')->name('post.pending');
			Route::put('post/{id}/approve', 'PostController@approval')->name('post.approve');
			
			//Subscriber
			Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
			Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');
			Route::get('/favorite','FavoriteController@index')->name('favorite.index');
			Route::get('comment','CommentController@index')->name('comment.index');
			Route::delete('comment/{id}','CommentController@destroy')->name('comment.destroy');
			
		}
);
Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author','middleware'=>['auth','author'] ],
		function(){
			Route::get('dashboard', 'DashboardController@index')->name('dashboard');

			//Setting Controller
			Route::get('setting', 'SettingsController@index')->name('settings');
			Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
			Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');
			Route::get('/favorite','FavoriteController@index')->name('favorite.index');
			Route::resource('/post','PostController');
			Route::get('comment','CommentController@index')->name('comment.index');
			Route::delete('comment/{id}','CommentController@destroy')->name('comment.destroy');
		}
);
