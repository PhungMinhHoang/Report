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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => '', 'namespace' => 'Api', 'as' => 'api.'], function () {
    Route::resource('du-an', 'DuAnController', ['except' => ['create', 'edit']]);
    Route::resource('kpi-veco', 'KPI_VecoController', ['except' => ['create', 'edit']]);
    Route::resource('don-vi', 'DonViController', ['except' => ['create', 'edit']]);
    Route::resource('quy-trinh', 'QuyTrinhController', ['except' => ['create', 'edit']]);
    Route::resource('kpi-quy-trinh', 'KPI_QuyTrinhController', ['except' => ['create', 'edit']]);

    Route::post('auth/login', 'AuthController@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('auth/user', 'AuthController@user');
    });
    Route::group(['middleware' => 'jwt.refresh'], function () {
        Route::get('auth/refresh', 'AuthController@refresh');
    });

    // Route::group(['prefix' => 'auth'], function () {
    //     Route::post('register', 'AuthController@register');
    //     Route::post('login', 'AuthController@login');
    //     Route::post('logout', 'AuthController@logout');

    //     Route::group(['middleware' => 'jwt.auth'], function () {
    //         Route::get('user', 'AuthController@user');
    //     });
    // });

});
