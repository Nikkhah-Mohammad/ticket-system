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

Route::get('/tickets','TicketController@index')->name('tickets.index');


Route::post('/tickets/{ticket}','TicketController@update')->name('tickets.update');

Route::get('/tickets/create','TicketController@create')->name('tickets.create');

Route::get('/tickets/delete/{ticket}','TicketController@delete')->name('tickets.delete');




Route::post('/tickets/delete/{ticket}','TicketController@destroy')->name('tickets.destroy');

Route::get('/tickets/{ticket}','TicketController@show')->name('tickets.show');