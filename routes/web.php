<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PagesController@index');
Route::get('/menu','PagesController@menu');
Auth::routes(['verify'=>true]);
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/orders','customerController@orders');
    // any route here will only be accessible for logged in users
    Route::post('/addtocart/{item}','customerController@addtocart');
    Route::post('/removecart/{item}','customerController@removecart');
    Route::get('/cart','customerController@cart');
    Route::post('/incCart/{item}','customerController@incCart');
    Route::post('/decCart/{item}','customerController@decCart');
    Route::post('/cancelorder/{id}','customerController@cancelorder');
    Route::post('/checkout','customerController@checkout');
    Route::get('/account','customerController@account');
    Route::get('/pendingorders','adminController@pendingorders');
    Route::get('/cancelledorders','adminController@cancelledorders');
    Route::get('/deliveredorders','adminController@deliveredorders');
    Route::post('/dispatchorder/{id}','adminController@dispatchorder'); 
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', function () {
    // Only verified users may enter...
    return "Hello";
})->middleware('verified');
