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
Route::get('/usuarios','UserController@index')->name('users');
Route::get('/nuevo-usuario','UserController@create')->name('create-user');
Route::get('/ver-usuario/{id}','UserController@show')->name('user-show');
Route::post('/crear-usuario','UserController@store')->name('user-store');
Route::get('/editar-usuario/{id}','UserController@edit')->name('user-edit');
Route::put('/actualizar-usuario/{id}','UserController@update')->name('user-update');
Route::delete('/eliminar-usuario/{id}','UserController@destroy')->name('user-destroy');


Route::get('/quitar-usuario-de-grupo/{user}/{id}','UserController@userDetachGroup')->name('user-detach-group');



Route::prefix('grupo')->group(function(){
    Route::get('/grupos','GroupController@index')->name('groups');
    Route::get('/nuevo-grupo','GroupController@create')->name('group-create');
    Route::post('/crear-grupo','GroupController@store')->name('group-store');
    Route::get('/ver-grupo/{group}','GroupController@show')->name('group-show');
    Route::put('/actualizar-grupo/{group}','GroupController@update')->name('group-update');
    Route::get('/editar-grupo/{group}','GroupController@edit')->name('group-edit');
    Route::delete('/eliminar-grupo/{group}','GroupController@destroy')->name('group-destroy');

    Route::get('/unir-usuario-a-grupo/{id}','GroupController@userAttachGroup')->name('user-attach-group');
    Route::get('/unir-grupo','GroupController@joinGroup')->name('user-join-group');

});

Route::get('/servicios', 'ServiceController@index')->name('services')->middleware('verified');
Route::post('/crear-servicio', 'ServiceController@store')->name('service-store');
Route::get('/nuevo-servicio','ServiceController@create')->name('service-create');
Route::get('/servicio/{service}','ServiceController@show')->name('service-show');
Route::get('/aditar-servicio/{service}','ServiceController@edit')->name('service-edit');
Route::get('actualizar-servicio/{service}','ServiceController@update')->name('service-update');
Route::delete('eliminar-servicio/{service}','ServiceController@destroy')->name('service-destroy');


Route::get('/realizar-pago/{user}/group/{group}','PaymentController@create')->name('payment-create');
Route::post('/guardar-pago/{user}/group/{group}','PaymentController@store')->name('payment-store');
Route::get('/pagos-usuario/{user}/{group}','PaymentController@showUserPayments')->name('show-user-payments');





Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/sucribirme/{id}', 'SuscriptionController@suscribe')->name('suscribe');
Route::get('/solicitudes/{group}', 'SuscriptionController@applications')->name('applications');
Route::get('/aprobar-solicitud/{id}', 'SuscriptionController@approved')->name('approved');
Route::get('/denegar-solicitud/{id}','SuscriptionController@rejected')->name('rejected');
Route::resource('/suscription', SuscriptionController::class);
