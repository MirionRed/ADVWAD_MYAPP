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

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/division/create', 'DivisionController@create')
  ->name('/division.create');
Route::post('/division/store', 'DivisionController@store')
  ->name('division.store');
Route::get('/division', 'DivisionController@index')
  ->name('division.index');
Route::get('/division/show/{id}','DivisionController@show')
  ->name('division.show');
Route::get('/division/edit/{id}','DivisionController@edit')
  ->name('division.edit');
Route::post('/division/update/{id}','DivisionController@update')
  ->name('division.update');

Route::get('/member/create', 'MemberController@create')
  ->name('/member.create');
Route::post('/member/store', 'MemberController@store')
  ->name('member.store');
Route::get('/member', 'MemberController@index')
  ->name('member.index');
Route::get('/member/show/{id}', 'MemberController@show')
  ->name('member.show');
Route::get('/member/edit/{id}', 'MemberController@edit')
  ->name('member.edit');
Route::post('/member/update/{id}', 'MemberController@update')
  ->name('member.update');
*/
/*Route::get('/group/create', 'GroupController@create')
  ->name('/group.create');
Route::post('/group/store', 'GroupController@store')
  ->name('group.store');*/

Route::resource('/group', 'GroupController',
  ['except' => ['destroy',]]);
Route::get('/group/addMember/{id}', 'GroupController@addMember')
  ->name('group.addMember');
Route::post('/group/updateAddMember/{id}', 'GroupController@updateAddMember')
  ->name('group.updateAddMember');

Route::resource('/division', 'DivisionController',
  ['except' => ['destroy',]]);

Route::resource('/member', 'MemberController',
  ['except' => ['destroy',]]);
Route::get('/member/addGroup/{id}', 'MemberController@addGroup')
  ->name('member.addGroup');
Route::post('/group/updateAddGroup/{id}', 'MemberController@updateAddGroup')
  ->name('member.updateAddGroup');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/practical7', 'Practical7@index')->name('practical7');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/member/{member}/upload', 'MemberController@upload')
  ->name('member.upload');
Route::post('/member/{member}/save-upload', 'MemberController@saveUpload')
  ->name('member.saveUpload');
