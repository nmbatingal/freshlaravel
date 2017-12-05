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
Route::get('/applicants/list', 'ApplicantsController@index')->middleware('auth')->name('applicants');			// index page for applicants
Route::get('/applicants/list/add', 'ApplicantsController@create')->middleware('auth')->name('applicant.add');	// route for adding new applicant
Route::post('/applicants/store', 'ApplicantsController@store')->name('applicant.store');						// store new applicant
Route::get('/applicants/edit/{id}', 'ApplicantsController@edit')->middleware('auth')->name('applicants.edit');
Route::get('/applicants/delete/{id}', 'ApplicantsController@destroy');
Route::get('/applicants/list/positions', 'ApplicantsController@positions');
Route::get('/applicants/forms', 'ApplicantsController@forms')->middleware('auth')->name('applicant.forms');
/*** END APPLICANTS CONTROLLER ***/

/*** LINEUP APPLICANTS CONTROLLER ***/
Route::get('/applicants/lineup', 'SelectionsController@index')->middleware('auth')->name('lineup');
Route::post('/applicants/lineup/create', 'SelectionsController@createSelectionLine');
Route::get('/applicants/lineup/delete/{id}', 'SelectionsController@destroy');
Route::get('/applicants/lineup/view/{id}', 'SelectionsController@view')->middleware('auth')->name('lineup.view');
Route::get('/applicants/lineup/print/{id}', 'SelectionsController@print')->middleware('auth')->name('lineup.print');
/*** END LINEUP APPLICANTS CONTROLLER ***/

/*** POSITION CONTROLLER ***/
Route::get('/positions', 'PositionsController@index')->middleware('auth')->name('positions');
Route::post('/positions/create', 'PositionsController@create')->name('positions.create');
/*** END POSITION CONTROLLER ***/