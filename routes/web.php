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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

/*** APPLICANTS CONTROLLER ***/
Route::get('/applicants/list', 'ApplicantsController@index')->middleware('auth')->name('applicants');
Route::get('applicants/list/add', [
  	'middleware' => ['auth'],
  	'uses' => function () {
   		return view('applicants.add'); 
}]);
Route::post('/add-applicant/create', 'ApplicantsController@create')->name('applicant.create');
Route::get('/applicants/delete/{id}', 'ApplicantsController@destroy');
Route::get('/applicants/list/positions', 'ApplicantsController@positions');
/*** END APPLICANTS CONTROLLER ***/

/*** LINEUP APPLICANTS CONTROLLER ***/
Route::get('/applicants/lineup', 'SelectionsController@index')->middleware('auth')->name('lineup');
Route::post('/applicants/lineup/create', 'SelectionsController@createSelectionLine');
Route::get('/applicants/lineup/view/{id}', 'SelectionsController@view')->middleware('auth')->name('lineup.view');
/*** END APPLICANTS CONTROLLER ***/

/*** POSITION CONTROLLER ***/
Route::get('/positions', 'PositionsController@index')->middleware('auth')->name('positions');
Route::post('/positions/create', 'PositionsController@create')->name('positions.create');
/*** END POSITION CONTROLLER ***/