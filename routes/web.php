<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Boat Engine Phase One
    Route::delete('boat-engine-phase-ones/destroy', 'BoatEnginePhaseOneController@massDestroy')->name('boat-engine-phase-ones.massDestroy');
    Route::resource('boat-engine-phase-ones', 'BoatEnginePhaseOneController');

    // Boat Engine Phase Two
    Route::delete('boat-engine-phase-twos/destroy', 'BoatEnginePhaseTwoController@massDestroy')->name('boat-engine-phase-twos.massDestroy');
    Route::resource('boat-engine-phase-twos', 'BoatEnginePhaseTwoController');

    // Development Project
    Route::delete('development-projects/destroy', 'DevelopmentProjectController@massDestroy')->name('development-projects.massDestroy');
    Route::post('development-projects/media', 'DevelopmentProjectController@storeMedia')->name('development-projects.storeMedia');
    Route::post('development-projects/ckmedia', 'DevelopmentProjectController@storeCKEditorImages')->name('development-projects.storeCKEditorImages');
    Route::resource('development-projects', 'DevelopmentProjectController');

    // List Of Ministry Projects
    Route::delete('list-of-ministry-projects/destroy', 'ListOfMinistryProjectsController@massDestroy')->name('list-of-ministry-projects.massDestroy');
    Route::resource('list-of-ministry-projects', 'ListOfMinistryProjectsController');

    // Fish Center
    Route::delete('fish-centers/destroy', 'FishCenterController@massDestroy')->name('fish-centers.massDestroy');
    Route::resource('fish-centers', 'FishCenterController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
