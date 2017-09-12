<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Registration and Login Endpoints*/
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

/*Sample Synopsisi Downlaod*/
Route::get('downloadSynopsis', function()
{
    $path = storage_path().'/'.'app'.'/'.'public'.'/'.'samplesynopsis'.'/'.'Synopsis.pdf';
    if (file_exists($path)) {
        return Response::download($path);
    }
});

/*Domains and their respective Topics*/
Route::get('domains/getDomains', 'DomainController@index');
Route::get('domains/getDomains/{id}/getTopics', 'DomainController@specificTopic');

/*Check whether student no and email already exist or not*/
Route::get('checkAlreadyExist/{student_no}', 'CheckStudentController@checkStudentNo');
Route::post('checkAlreadyExist', 'CheckStudentController@checkEmail');

/*Logout and Upload synopsis api*/
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
