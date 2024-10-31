<?php


Route::group(['namespace'=>'Auth','prefix'=>'/','middleware'=>'AdminGuest','as'=>'admin.auth.'],function(){
//register
Route::get('register','AdminController@showRegistrationForm')->name('register');
Route::post('register_submit','AdminController@register_submit')->name('register_submit');
//login admin
Route::get('/','AdminController@login')->name('login');
Route::post('/login','AdminController@login_submit')->name('login_submit');
});
//logout admin
Route::post('admin/logout','Auth\AdminController@logout')->name('admin.logout')->middleware('Admin');


//reset admin users password
Route::group(['namespace'=>'Auth','prefix'=>'admin/reset','as'=>'admin.reset.'],function(){
    Route::get('/mail','AdminController@mail')->name('mail');
    Route::post('/mail_submit','AdminController@mail_submit')->name('mail_submit');
    Route::get('/reset_password_form/{token}','AdminController@reset_password_form')->name('reset_password_form');
    Route::post('/reset_password_submit','AdminController@reset_password_submit')->name('reset_password_submit');
});

//admin controls 
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>'Admin'],function(){
    //dashboard
    Route::get('/','IndexController@index')->name('index'); 



    //profile
    Route::group(['prefix'=>'profile','as'=>'profile.'],function(){
        Route::get('edit','ProfileController@edit')->name('edit');
        Route::post('update','ProfileController@update')->name('update');
    });

    //genders
    Route::resource('genders','GendersController');
    Route::get('get_genders','GendersController@ajax')->name('get_genders');

    
    //statyus
    Route::resource('statuses','StatusesController');
    Route::get('get_statuses','StatusesController@ajax')->name('get_statuses');
 
    //category
    Route::resource('categories','CategoriesController');
    Route::get('get_categories','CategoriesController@ajax')->name('get_categories');
    
    //religion
    Route::resource('religions','ReligionsController');
    Route::get('get_religions','ReligionsController@ajax')->name('get_religions');

    //birthcountries
    Route::resource('birthcountries','BirthCountriesController');
    Route::get('get_birthcountries','BirthCountriesController@ajax')->name('get_birthcountries');


    //nationality
    Route::resource('nationalities','NationalitiesController');
    Route::get('get_nationalities','NationalitiesController@ajax')->name('get_nationalities');

    //roles
    Route::resource('roles','RolesController');
    Route::get('get_roles','RolesController@ajax')->name('get_roles');

    //users
    Route::resource('users','UsersController');
    Route::get('get_users','UsersController@ajax')->name('get_users');
   
    
    
});

?>