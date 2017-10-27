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

Route::get('home', 'HomeController@index')->name('home');

Auth::routes();

/*** APPLICANTS CONTROLLER ***/
Route::get('applicants/list', 'ApplicantsController@index')->middleware('auth')->name('applicants');

Route::get('applicants/list/add', [
  	'middleware' => ['auth'],
  	'uses' => function () {
   		return view('applicants.add'); 
}]);

Route::post('/add-applicant/create', 'ApplicantsController@create');

Route::get('applicants/delete/{id}', 'ApplicantsController@destroy');
/*** END APPLICANTS CONTROLLER ***/

/*** LINEUP APPLICANTS CONTROLLER ***/
Route::get('lineup', 'SelectionsController@index')->middleware('auth')->name('lineup');

Route::post('lineup/create', 'SelectionsController@createSelectionLine');

Route::get('lineup/view/{id}', 'SelectionsController@view')->middleware('auth')->name('lineup.view');
/*** END APPLICANTS CONTROLLER ***/