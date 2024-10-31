<?php
Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){
   


//get category
Route::get('get_categories','AjaxController@get_categories')->name('get_categories');
//create category
Route::post('create_category','AjaxController@create_category')->name('create_category');
    


//get status
Route::get('get_statuses','AjaxController@get_statuses')->name('get_statuses');
//create status
Route::post('create_status','AjaxController@create_status')->name('create_status');

    //get gender
    Route::get('get_genders','AjaxController@get_genders')->name('get_genders');
    //create gender
    Route::post('create_gender','AjaxController@create_gender')->name('create_gender');
    //get nationality
    Route::get('get_nationalities','AjaxController@get_nationalities')->name('get_nationalities');
    //create nationality
    Route::post('create_nationality','AjaxController@create_nationality')->name('create_nationality');
    //get birth country
    Route::get('get_birthcountries','AjaxController@get_birthcountries')->name('get_birthcountries');
    //create birth country
    Route::post('create_birthcountry','AjaxController@create_birthcountry')->name('create_birthcountry');
   
      //get religion
      Route::get('get_religions','AjaxController@get_religions')->name('get_religions');
      //create religion
      Route::post('create_religion','AjaxController@create_religion')->name('create_religion');


      Route::get('get_status_by_name','AjaxController@get_status_by_name')->name('get_status_by_name');
      
    //get roles
    Route::get('get_roles','AjaxController@get_roles')->name('get_roles');  

});

?>