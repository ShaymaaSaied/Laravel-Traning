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


/*
 * service container
 * strip example
 *
 * */

$strip=App::make('App\Billing\Stripe');
//dd($strip);
/*
 * Posts Routing
 *
 */
Route::get('/posts','PostsController@index');
Route::get('/posts/{post}','PostsController@show');
//Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::post('/posts/{post}/comments','CommentsController@store');
Route::get('/posts/tags/{tag}','TagsController@index');

/**
 * Routing with Controller
 */
Route::get('/tasks','TasksController@index');
Route::get('/tasks/{task}','TasksController@show');

/*
 * Working without controller
 *
 * */
Route::get('/', function () {

    /*$tasks=['task1','task2'];*/
    $tasks=DB::table('tasks')->get();
    /*return $tasks;*/
    return view('home',compact('tasks'));
});

/*Route::get('/tasks', function () {

    /*$tasks=['task1','task2'];*/
    /*
     * DB Queries
     * */
    /*$tasks=DB::table('tasks')->get();*/
    /*$tasks=DB::table('tasks')->latest()->get();*/

    /*
     * working with Model
     * */
    /*return $tasks;*/
    /*
    $tasks=\App\Task::all();
    /*return view('welcome',compact('tasks'));*/
    /*return view('tasks.index',compact('tasks'));
});*/
/*Route::get('/tasks/{task}', function ($id) {

    /*
     * DB Queries
     * */
    /*$tasks=['task1','task2'];*/
    /*$task=DB::table('tasks')->find($id);*/

    /*
     * working with Model
     * */
    /*$task=\App\Task::find($id);
    /*return $tasks;*/
    /*return view('welcome',compact('task'));*/
   /* return view('tasks.show',compact('task'));
});*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
