<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/test', 'WelcomeController@test');
Route::get('/pdfrank', 'WelcomeController@pdfrank');
Route::get('/profile', 'WelcomeController@typecase');

Route::get('/test', function () {
    $criminalhistory = \App\Models\CriminalHistory::with('datacase.cases.typecase','typepeople','sex','addresspresent',
        'addressoriginal','datafather','datamother','dataspouse','datachild','addressoffice')->find(8);
    return View('test3')->with('criminalhistory',$criminalhistory);
});
Route::get('/pdf', function(){

    $profile = App\Models\DataCase::with('criminalhistory')->find(29);
        return $profile;
    //$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);
    $pdf = \App::make('mpdf.wrapper',['th','A4','','',20,15,20,25,10,10,]);

    $pdf->SetWatermarkText("TEST");

    

    $pdf->SetDisplayMode('fullpage');

    $html = view('test')->with('profile',$profile)->render();
    $pdf->WriteHTML($html);

    $pdf->stream();

});

Route::get('/testqq', function () {
    $type = App\Models\TypeCase::with('cases')->find(5);

    return $type;
});

/////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('home', 'HomeController@index');


\Blade::setContentTags('<%', '%>'); // for variables and all things Blade

Route::get('/police/index', function () {
    return View::make('index');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware'=>'admin'],function(){

    Route::get('/police/user', 'Admin\PoliceController@index');
    Route::get('/police/mylog', 'Admin\MyLogController@index');
    Route::get('/police/getmylog', 'Admin\MyLogController@getMyLog');


});


Route::group(['middleware'=>'member'],function(){


    Route::get('/police/case', 'Admin\CaseController@index');
    Route::get('/police/person', 'Admin\PresonController@index');
    Route::get('/police/person_crime', 'Admin\PersonOneController@index');
    Route::get('/police/person_general', 'Admin\GuestHistoryController@index');
    Route::get('/police/place_general', 'Admin\PlaceGeneralController@index');
    Route::get('/police/statistics', 'Admin\StatisticsController@index');



});

Route::get('/police/profile', 'Admin\ProfilePoliceController@index');
Route::get('/police/getprofile', 'Admin\ProfilePoliceController@getProfile');

Route::post('api/auth/login', 'API\AuthApiController@authenticate');
Route::get('api/auth/logout', 'API\AuthApiController@unAuthenticate');
Route::get('api/auth/user', 'API\AuthApiController@user');

Route::group(['prefix'=>'api'],function(){
    /*
     * list : GET /api/police
     * store : POST /api/police
     */
    Route::post('police/{id}/photo','API\PoliceApiController@savePhotoPolice');
    Route::resource('police','API\PoliceApiController');

    Route::resource('person_crime','API\PersonOneApiController');
    Route::post('person_crime/{id}/photo','API\PersonOneApiController@savePhotoPerson');
    Route::post('person_crime/case/search','API\PersonOneApiController@searchCasePerson');
    Route::post('person_crime/data/search','API\PersonOneApiController@searchDataPerson');

    Route::post('person_crime/search/person_crime','API\PersonOneApiController@searchIdCardPersonCrime');
    Route::post('person_crime/search/person_general','API\PersonOneApiController@searchIdCardPersonGeneral');

    Route::get('person_crime/{id}/print_photo_person','API\PersonOneApiController@printPhotoPerson');
    Route::resource('person_crime.case','API\PersonCaseApiController');
    Route::resource('person_crime.child','API\PersonChildApiController');
    Route::resource('person_crime.address_office','API\PersonAddressOfficeApiController');
    Route::get('person_crime/{id}/generated_pdf_person','API\PersonOneApiController@generatedPdfPerson');

    Route::resource('case','API\CaseApiController');
    Route::post('case/delete/{id}/person','API\CaseApiController@deleteCasePerson');
    Route::resource('case.person','API\CasePersonApiController');
    Route::resource('case.vehicle','API\CaseVehicleApiController');
    Route::resource('case.weapon','API\CaseWeaponApiController');
    Route::post('case/{id}/file','API\CaseApiController@saveCaseFile');
    Route::post('case/save_number_case/{id}','API\CaseApiController@saveNumberCase');
    Route::get('case/{id}/generated_pdf_case','API\CaseApiController@generatedPdfCase');


    Route::resource('statistics','API\StatisticsApiController');
    Route::post('statistics/search','API\StatisticsApiController@searchDataCase');
    Route::post('statistics/printpdf','API\StatisticsApiController@printDataCase');

    Route::resource('guesthistory','API\GuestHistoryApiController');
    Route::resource('guesthistory.child','API\GuestChildApiController');
    Route::resource('guesthistory.employee','API\GuestEmployeeApiController');
    Route::resource('guesthistory.person_family','API\GuestPersonFamilyApiController');
    Route::resource('guesthistory.vehicle','API\GuestVehicleApiController');
    Route::resource('guesthistory.address_office','API\GuestAddressOfficeApiController');
    Route::post('guesthistory/{id}/photo','API\GuestHistoryApiController@savePhotoGuest');
    Route::get('guesthistory/{id}/generated_pdf_case','API\GuestHistoryApiController@generatedPdfCase');
    Route::get('guesthistory/{id}/print_photo_person','API\GuestHistoryApiController@printPhotoPerson');

    Route::resource('weapon','API\WeaponApiController');


});

Route::get("/TEST111", function () {



    DB::update("ALTER TABLE RANK AUTO_INCREMENT = 1000;");

});

Route::get("/rank", function () {
    return  App\Models\Rank::all();
});

Route::get("/case", function () {
    return  App\Models\Cases::all();
});


Route::get("/role", function () {
    return  App\Models\Role::all();
});
Route::get("/position", function () {
    return  App\Models\Position::all();
});
