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

Route::get('/', function () {
    return view('homepage');
})->name('home');


/*
|------------------------------------------------------------------------
|   Reload Pages   
|------------------------------------------------------------------------
|
*/
Route::get('/reload', 'PaymentController@Reload')->name('reload');

Route::post('/reload', 'PaymentController@Reload_Purchase')->name('reload');

Route::post('/reload/purchase', 'PaymentController@Reload_Complete')->name('reload_complete');

Route::get('/getCard', function() {
    return view('payment.display_card');
})->name('card_gen');


/*
|------------------------------------------------------------------------
|   Contact Us
|------------------------------------------------------------------------
|
*/
Route::get('/contactus', 'ContactController@index')->name('contact');

Route::post('/contactus', 'ContactController@sendContact')->name('contact');