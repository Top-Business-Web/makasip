<?php


use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ConfirmationTaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('test', [HomeController::class,'test']);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class,'index'])->name('/');

    Route::get('rest/password','Site\AuthController@resetPassword')->name('resetPassword');

    Route::get('edit/password/fromMail/{id}','Site\AuthController@editPasswordFromMail')->name('editPasswordFromMail');


############# User Auth ##################
    Route::get('register', 'Site\AuthController@register')->name('register');
    Route::POST('UserRegistration', 'Site\AuthController@UserRegistration')->name('UserRegistration');
    Route::get('login', 'Site\AuthController@login')->name('login');
    Route::post('postLogin', 'Site\AuthController@postLogin')->name('postLogin');

    Route::get('/register/{referral_code}', 'Site\AuthController@register')->name('register.referral');

    Route::group(['middleware' => 'auth:user', 'namespace' => 'Site'], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('profile', 'AuthController@profile')->name('profile');
        Route::post('edit/myProfile','AuthController@editProfile')->name('admin.edit.myProfile');
        Route::post('edit/myPassword','AuthController@editPassword')->name('admin.edit.myPassword');
        Route::get('delete/myProfile','AuthController@deleteMyProfile')->name('admin.deleteMyProfile');

        Route::get('homepage', 'HomeController@homepage')->name('homepage');
        Route::get('MySites', 'HomeController@MySites')->name('MySites');
        Route::get('AddSite/{type}', 'HomeController@AddSite')->name('AddSite');
        Route::get('subscription', 'HomeController@subscription')->name('subscription');
        Route::get('buyPoints', 'HomeController@buyPoints')->name('buyPoints');


        #### My messages #####
        Route::get('messages/user', 'MessageController@index')->name('messagesIndex');
        Route::post('messages/delete', 'MessageController@delete')->name('messageDelete');
        Route::post('messages/read', 'MessageController@messageRead')->name('messageRead');
        Route::post('messages/MarkALLRead', 'MessageController@messageAllRead')->name('messageAllRead');

        #### My Sites #####
        Route::post('publishMySite', 'HomeController@publishMySite')->name('publishMySite');
        Route::post('deleteMySite', 'HomeController@deleteMySite')->name('deleteMySite');
        Route::put('activeMySite', 'OtherSitesController@activeMySite')->name('activeMySite');;

        ##### Instagram ####
        Route::group(['prefix' => 'instagram'], function () {
            Route::get('followers', 'InstagramController@followers')->name('instagram.followers');
            Route::get('likes', 'InstagramController@likes')->name('instagram.likes');
        });

        ##### Twitter ####
        Route::group(['prefix' => 'twitter'], function () {
            Route::get('tweets', 'TwitterController@tweets')->name('twitter.tweets');
            Route::get('followers', 'TwitterController@followers')->name('twitter.followers');
            Route::get('retweets', 'TwitterController@retweets')->name('twitter.retweets');
            Route::get('likes', 'TwitterController@likes')->name('twitter.likes');
        });

        ##### Youtube ####
        Route::get('youtube/{page}', 'YoutubeController@index')->name('youtube.index');

        ##### Tiktok ####
        Route::get('tiktok/{page}', 'TiktokController@index')->name('tiktok.index');

        ##### SoundCloud ####
        Route::get('soundcloud/{page}', 'SoundcloudController@index')->name('soundcloud.index');

        ##### otherSites ####
        Route::get('otherSites/{page}', 'OtherSitesController@index')->name('otherSites.index');

        #### Confirmation Task ####
        Route::post('upload-image', 'ConfirmationTaskController@uploadImage')->name('uploadImage');



        ##### Facebook ####
        Route::get('facebookShare', 'FacebookController@facebookShare')->name('facebookShare');
        Route::get('facebookFollowers', 'FacebookController@facebookFollowers')->name('facebookFollowers');
        Route::get('facebookPostLike', 'FacebookController@facebookPostLike')->name('facebookPostLike');
        Route::get('facebookPostShare', 'FacebookController@facebookPostShare')->name('facebookPostShare');

        ##### Site Type ####
        Route::get('siteType/{id}', 'SiteTypeController@index')->name('SiteTypeController');


        ##### Payment ####
        Route::get('checkPay', 'HomeController@checkPay')->name('checkPay');
        Route::get('pointsPrices/{id}', 'HomeController@pointsPrices')->name('pointsPrices');

    });
    Route::get('forgetPassword', 'Site\AuthController@forgetPassword')->name('forgetPassword');

});


##### No Need To Lang
Route::post('checkUserView', 'Site\FacebookController@checkUserView')->name('checkUserView');


