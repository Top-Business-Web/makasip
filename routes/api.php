<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Password\ForgotPasswordController;
use Password\CodeCheckController;
use Password\ResetPasswordController;
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


Route::group([ 'middleware' => 'api','namespace' => 'Api'], function () {

    Route::post('password/email',  ForgotPasswordController::class);
    Route::post('password/code/check', CodeCheckController::class);
    Route::post('password/reset', ResetPasswordController::class);

    ### Auth
    route::post('login','AuthController@login');
    route::post('register','AuthController@register');
    route::post('logout','AuthController@logout');
    route::post('updateProfile','AuthController@updateProfile');
    route::post('deleteMyAccount','AuthController@deleteMyAccount');
    route::get('my-profile','AuthController@myprofile');
    route::get('make-points-money','AuthController@makePointsMoney');

    ### Site
    route::post('addPost','SiteController@addPost');
    route::get('posts','SiteController@posts');
    route::get('postTypes','SiteController@postTypes');
    route::POST('deleteMySite','SiteController@deleteMySite');
    route::POST('checkUserView','SiteController@checkUserView');
    route::GET('mySites','SiteController@mySites');

    ### Points
    route::get('latestPoints','PointController@latestPoints');
    route::get('allPoints','PointController@allPoints');
    route::get('pointsPrices','PointController@pointsPrices');
    route::get('pointsPay/{token}','PointController@pointsPay')->name('api.pointsPrices');
    route::get('checkPay','PointController@checkPay');
    route::get('payment_status','PointController@payment_status');

    ### Setting
    route::get('setting','SettingController@setting');
    route::get('countries','CountryController@index');
    Route::get('sliders', 'SliderController@index');


});


