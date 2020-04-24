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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin'], function (){
    Route::get('/admin', function (){
        return view('admin.index');
    });
    Route::resource('admin/campuses', 'AdminCampusesController',['names'=>[
        'index'=>'admin.campuses.index',
        'create'=>'admin.campuses.create',
        'store'=>'admin.campuses.store',
        'edit'=>'admin.campuses.edit',
        'show'=>'admin.campuses.show'
    ]]);

    Route::resource('admin/events', 'AdminEventsController',['names'=>[
        'index'=>'admin.events.index',
        'create'=>'admin.events.create',
        'store'=>'admin.events.store',
        'edit'=>'admin.events.edit',
        'show'=>'admin.events.show'
    ]]);

    Route::resource('admin/sports', 'AdminSportsController',['names'=>[
        'index'=>'admin.sports.index',
        'create'=>'admin.sports.create',
        'store'=>'admin.sports.store',
        'edit'=>'admin.sports.edit',
        'show'=>'admin.sports.show'
    ]]);

    Route::resource('admin/teams', 'AdminTeamsController',['names'=>[
        'index'=>'admin.teams.index',
        'create'=>'admin.teams.create',
        'store'=>'admin.teams.store',
        'edit'=>'admin.teams.edit',
        'show'=>'admin.teamsd.show'
    ]]);
});
