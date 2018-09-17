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

Route::get('/', 'AdminPanelController@adminpanel');

Route::get('test', function () {
//    echo $date = date("Y-m-d", time());
//   echo '<br>';
//    return strtotime($date);
//    return date("Y-m-d", strtotime('-30 days'));
//    return date(strtotime('today - 30 days'));
});

//Route::get('worker/{id}/{pdf}', 'WorkerController@fun_pdf')->name('downloadfile');
Route::get('worker/{id}/download', 'WorkerController@fun_pdf')->name('downloadfile');

Route::resource('worker', 'WorkerController');
Route::resource('sallary', 'SallaryController');

Route::get('salary/{id}', 'SallaryController@salaryforuser')->name('salaryforperson');

Route::resource('absence', 'AbsenceController');
Route::resource('parttime', 'ParttimeController');