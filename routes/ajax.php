<?php
Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){
   


//get category
Route::get('get_categories','AjaxController@get_categories')->name('get_categories');
//create category
Route::post('create_category','AjaxController@create_category')->name('create_category');
    

  //get reservations
  Route::get('get_reservations','AjaxController@get_genders')->name('get_reservations');
  //create reservations
  Route::post('create_reservation','AjaxController@create_reservation')->name('create_reservation');

  //get studenttypes
  Route::get('get_studenttypes','AjaxController@get_studenttypes')->name('get_studenttypes');
  //create studenttypes
  Route::post('create_studenttype','AjaxController@create_studenttype')->name('create_studenttype');

//get status
Route::get('get_statuses','AjaxController@get_statuses')->name('get_statuses');
//create status
Route::post('create_status','AjaxController@create_status')->name('create_status');


//get numbersiblings
Route::get('get_numbersiblings','AjaxController@get_numbersiblings')->name('get_numbersiblings');
//create numbersiblings
Route::post('create_numbersiblings','AjaxController@create_numbersiblings')->name('create_numbersiblings');

//get location
Route::get('get_locations','AjaxController@get_locations')->name('get_locations');
//create location
Route::post('create_locations','AjaxController@create_locations')->name('create_locations');

//get reservations
Route::get('get_reservations','AjaxController@get_reservations')->name('get_reservations');
//create reservations
Route::post('create_reservations','AjaxController@create_reservations')->name('create_reservations');

//get curriculums
Route::get('get_curriculums','AjaxController@get_curriculums')->name('get_curriculums');
//create curriculums
Route::post('create_curriculums','AjaxController@create_curriculums')->name('create_curriculums');


//get //mother language
Route::get('get_motherlanguages','AjaxController@get_motherlanguages')->name('get_motherlanguages');
//create mother language
Route::post('create_motherlanguages','AjaxController@create_motherlanguages')->name('create_motherlanguages');

//get grades
Route::get('get_grades','AjaxController@get_grades')->name('get_grades');
//create grades
Route::post('create_grades','AjaxController@create_grades')->name('create_grades');


//get modes
Route::get('get_modes','AjaxController@get_modes')->name('get_modes');
//create mode
Route::post('create_modes','AjaxController@create_modes')->name('create_modes');




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