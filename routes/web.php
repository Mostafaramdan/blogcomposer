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




//Route::prefix('adminpanel')->group(function(){
Route::get('/',function(){return view('welcome');});			
route::get('px','PageController@index2');	


//posts
route::resource('post','postcontroller');



//auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//contact
Route::get('contactUs','contactUscontroller@contact');
Route::post('/dosend' ,'contactUscontroller@dosend' );



Route::post('/comment/{slug}','commentcontroller@store')->name('comments.store');


Route::get('user/{id?}', function( $id=null ){
		return 'hello :  '.$id ; })->where('id','[0-9A-aZ-z]+');

route::any('deletecomment','commentcontroller@destroy');
