<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Assetcategories
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Assets
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {
    // Assets
    Route::get('works', 'AssetApiController@index');
    Route::get('categories', 'AssetApiController@categories');
    Route::get('works/modal', 'AssetApiController@modal');

    Route::get('questions', 'QuestionApiController@index');

    Route::post('send', 'AssetApiController@send');
});
