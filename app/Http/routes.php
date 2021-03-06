<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');

    Route::resource('usuarios', 'UsuarioController');
    Route::get('usuarios/{id}/delete', [
        'as' => 'usuarios.delete',
        'uses' => 'UsuarioController@destroy',
    ]);

    Route::resource('noticias', 'NoticeController');

    Route::get('noticias/{id}/delete', [
        'as' => 'noticias.delete',
        'uses' => 'NoticeController@destroy',
    ]);

    Route::resource('cuentas', 'CuentaController');

    Route::get('cuentas/{id}/create', [
         'as' => 'cuentas.create',
         'uses' => 'CuentaController@create']);

    Route::get('cuentas/{id}/delete', [
        'as' => 'cuentas.delete',
        'uses' => 'CuentaController@destroy',
    ]);

    
   Route::get('emails/index', [
        'as' => 'emails.index',
        'uses' => 'EmailController@index'
    ]);

    Route::get('emails/unseen', [
        'as' => 'emails.unseen',
        'uses' => 'EmailController@unseen'
    ]);

    Route::get('emails/{id}/show', [
        'as' => 'emails.show',
        'uses' => 'EmailController@show',
    ]);
    
    Route::get('emails/{id}/markMailAsRead', [
        'as' => 'emails.markMailAsRead',
        'uses' => 'EmailController@markMailAsRead',
    ]);

    Route::get('emails/{id}/markMailAsUnread', [
        'as' => 'emails.markMailAsUnread',
        'uses' => 'EmailController@markMailAsUnread',
    ]);

    Route::resource('sistemas', 'SistemaController');

    Route::get('sistemas/{id}/delete', [
        'as' => 'sistemas.delete',
        'uses' => 'SistemaController@destroy',
    ]);

    Route::resource('impresoras', 'ImpresoraController');

    Route::get('impresoras/{id}/create', [
         'as' => 'impresoras.create',
         'uses' => 'ImpresoraController@create']);

    Route::get('impresoras/{id}/delete', [
    'as' => 'impresoras.delete',
    'uses' => 'ImpresoraController@destroy']);

    Route::get('impresoras/{id}/imprimir', [
    'as' => 'impresoras.imprimir',
    'uses' => 'ImpresoraController@imprimir']);

    Route::get('getldapusers', [
        'as' => 'getldapusers',
        'uses' => 'UsuarioController@getldapusers'
    ]);
});

