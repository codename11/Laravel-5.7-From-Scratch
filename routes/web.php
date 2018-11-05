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

Route::get('/', "PagesController@index");
Route::get('/about', "PagesController@about");
Route::get('/contact', "PagesController@contact");

Route::resource("projects", "ProjectsController");
/*
Route::get("/projects", "ProjectsController@index");
Route::get("/projects/create", "ProjectsController@create");
Route::post("/projects", "ProjectsController@store");
Route::get("/projects/{project}", "ProjectsController@show");
Route::get("/projects/{project}/edit", "ProjectsController@edit");
Route::put("/projects/{project}/update", "ProjectsController@update");
Route::delete("/projects/{project}/update", "ProjectsController@destroy");
*/

/*Route::get('/', function () {

    $tasks = [
        "Go to the store", 
        "Go to the market", 
        "Go to work",
        "Go to concerto"
    ];


    return view('welcome', [
        "tasks" => $tasks,
        "foo" => "foobar"
        "title" => request('title')
        Ovo ce u adres baru da gleda parametar 
        title i prikazace njegovu vrednost u view-u.
        ]);

    return view('welcome')->withTasks($tasks);
});*/

