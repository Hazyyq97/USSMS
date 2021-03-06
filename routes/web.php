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
        'show'=>'admin.events.show',

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
        'show'=>'admin.teams.show',

    ]]);


    Route::resource('admin/managers', 'AdminManagersController',['names'=>[
        'index'=>'admin.managers.index',
        'create'=>'admin.managers.create',
        'store'=>'admin.managers.store',
        'edit'=>'admin.managers.edit',
        'show'=>'admin.managers.show',

    ]]);

    Route::get('admin/managers/create/ajax1/{id}', array('as'=>'admin.managers.create.ajax', 'uses'=>'AdminManagersController@teamAjax'));
    Route::get('admin/managers/create/ajax2/{id}', array('as'=>'admin.managers.create.ajax', 'uses'=>'AdminManagersController@sportAjax'));

});

Route::group(['middleware'=>'umpire'], function(){
    Route::get('/umpire', function(){
        return view('umpire.index');
    });

    Route::resource('umpire/schedules', 'UmpireSchedulesController',['names'=>[
        'index'=>'umpire.schedules.index',
        'create'=>'umpire.schedules.create',
        'store'=>'umpire.schedules.store',
        'edit'=>'umpire.schedules.edit',
        'show'=>'umpire.schedules.show',
    ]]);

    Route::resource('umpire/results', 'UmpireResultsController',['names'=>[
        'index'=>'umpire.results.index',
        'create'=>'umpire.results.create',
        'store'=>'umpire.results.store',
        'edit'=>'umpire.results.edit',
        'show'=>'umpire.results.show',
    ]]);

    Route::resource('umpire/medals', 'UmpireMedalsController',['names'=>[
        'index'=>'umpire.medals.index',
        'create'=>'umpire.medals.create',
        'store'=>'umpire.medals.store',
        'edit'=>'umpire.medals.edit',
        'show'=>'umpire.medals.show',
    ]]);


});
