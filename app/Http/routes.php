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

use App\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Nest\Nest;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', ['as'=>'home', function () {
        return view('welcome');
    }]);

    Route::get('/manage', 'ManageController@receive');
    Route::post('/manage', 'ManageController@receive');

    Route::get('/panel/users', 'Controller@listUsers');
    Route::get('/panel/logs', 'Controller@listLogs');

    Route::get('/response', 'ManageController@receive');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

});
