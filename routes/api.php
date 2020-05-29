<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization, enctype');


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("registerWorldCase" , "WorldCasesController@create");

Route::get("WorldCases" , "WorldCasesController@show"); 

Route::get("WorldCasesTotal" , "WorldCasesController@getAllWorldCases");

Route::post("registerCountryCase" , "CountryCasesController@create");

Route::post("getAllCountryCases" , "CountryCasesController@getAllCountryCases");

Route::post("getCasePerCountry" , "CountryCasesController@getCasePerCountry");

Route::get("showCountryCases" , "CountryCasesController@show");