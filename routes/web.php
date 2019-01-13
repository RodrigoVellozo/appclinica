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

Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/','RestController@getIndex');
Route::post('ajax_getProfissionais','RestController@ajax_getProfissionais');
Route::get('agendamento/{id1}/{id2}','RestController@goAgendamento');
Route::post('agendamentoAjax','RestController@create');


