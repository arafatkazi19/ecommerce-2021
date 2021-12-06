<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for frontend
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

/*
|--------------------------------------------------------------------------
| Web Routes for admin section
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin'],function(){
    //admin dashboard
	Route::get('/dashboard','App\Http\Controllers\Backend\PagesController@dashboard')->name('admin.dashboard');

    //Brand Routes
    Route::group(['prefix','/brand'],function (){
        Route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');
        Route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create');
        Route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.update');
        Route::post('/destroy/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy');


    });

});
