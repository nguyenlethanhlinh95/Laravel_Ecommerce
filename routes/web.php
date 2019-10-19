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

//Route::get('/', function () {
//    return view('welcome');
//});




Auth::routes();
/*
 * Route page
 * */
Route::get('/', 'HomeController@index')->name('index');
Route::get('/shop', 'HomeController@index')->name('shop');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']],
    function ()
    {
        Route::get('/', function ()
        {
            return view('admin.index');
        })->name('admin.index');

        Route::resource('product', 'ProductsController');
    });
