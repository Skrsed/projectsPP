<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
Route::group(
    [           
        'namespace' => 'Api\V1',
        'prefix' => 'v1',
    ], function(){
        Route::get('numToWords/{number}', 'APIsController@numToWord')->name("numToWords");
        Route::get('quadratics', 'APIsController@quadratics')->name("quad");
        Route::get('weekdays', 'APIsController@weekdays')->name("date");
        Route::get('fibonaccis/{n}', 'APIsController@fibonaccis')->name("fibonacci");
        Route::get('regions/{code}', 'APIsController@regions')->name("regions");
        //Route::get('numToWords/{number}', 'APIsController@numToWord');
});
//Route::get('numbersInWords/{number}', 'NumericController@show');
