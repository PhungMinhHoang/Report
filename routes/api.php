<?php

Route::group(['prefix' => '', 'namespace' => 'Api', 'as' => 'api.'], function () {
    Route::post('auth/login', 'AuthController@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('auth/user', 'AuthController@user');
        Route::post('auth/logout', 'AuthController@logout');
        Route::resource('du-an', 'DuAnController', ['except' => ['create', 'edit']]);
        Route::resource('kpi-veco', 'KPI_VecoController', ['except' => ['create', 'edit']]);
        Route::resource('don-vi', 'DonViController', ['except' => ['create', 'edit']]);
        Route::resource('quy-trinh', 'QuyTrinhController', ['except' => ['create', 'edit']]);
        Route::resource('kpi-quy-trinh', 'KPI_QuyTrinhController', ['except' => ['create', 'edit']]);
        Route::get('tai-lieu-quy-trinh/{id}', 'KPI_QuyTrinhController@getTaiLieuQuyTrinh');
        Route::post('data-kpi-quy-trinh', 'KPI_QuyTrinhController@findDataKpiQuyTrinh');
        Route::post('import-kpi-quy-trinh', 'KPI_QuyTrinhController@importKPIQuyTrinh');

        Route::post('module', 'KPI_QuyTrinhController@getModule');

        Route::get('/QA', 'UserController@getDanhSachQA');
        Route::get('/don-vi-ap-dung-quy-trinh', 'DonViController@getDonViApDungQuyTrinh');

        Route::post('/changePassword', 'UserController@changePassword');
        
    });
    Route::group(['middleware' => 'jwt.refresh'], function () {
        Route::get('auth/refresh', 'AuthController@refresh');
    });
});
