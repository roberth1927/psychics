<?php

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

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Illuminate\Http\Request;

/**BLOG ROUTES */
include_once('blog.php');
/**BLOG ROUTES */

//Route::view('/', 'frontend/home', ['home' => true,'unsubscribe'=>false])->name('home')->middleware('verifyphone', 'verifield', 'checkgclid');

Route::get('/', 'FrontController@index')->name('home')->middleware('verifyphone', 'verifield', 'checkgclid');

Route::get('/psychic/redirect', 'FrontController@psychicRedirect')->name('psychic_redirect');


Route::get('/get-5-free', 'FrontController@get5Free')->name('free5');

Route::get('/tarotreading', 'FrontController@tarotReading')->name('tarotreading');
Route::get('/astrology', 'FrontController@astrology')->name('astrology');
Route::get('/palm-reading', 'FrontController@palmReading')->name('palm-reading');
Route::get('/medium', 'FrontController@medium')->name('medium');
Route::get('/clairvoyant', 'FrontController@clairvoyant')->name('clairvoyant');
Route::get('/spiritual-healing', 'FrontController@spiritualHealinglp')->name('spiritual-healing');
Route::get('/psychic', 'FrontController@psychiclp')->name('psychic');
Route::get('/tarot-card-reading', 'FrontController@tarotCardReading')->name('tarot-card-reading');
Route::get('/paulaabdul', 'FrontController@paulaabdulLanding')->name('paulaabdul');
Route::get('/paula', 'FrontController@paulaabdulLandingVideo')->name('paulaabdul-video');

Route::get('/apply', function () {
    return view('home');
})->middleware('verifyphone', 'verifield');

Route::get('/new-client-promo', 'FrontController@newClientPromo')->name('newpromo');

Route::get('/specialties', 'FrontController@specialtiesRedirect')->name('specialties_redirect'); //REMOVE OLD SPECIALTIES

Route::get('/abilities/{slug}', 'FrontController@searchAbilities')->name('specialty');

Route::get('sms_marketing/hd988ns7h8hhj998', 'Api\SMSBlastController@sendSmsMarketing'); //'Api\SMSBlastController@sendSMSBlast');

Route::view('/about', 'welcome')->middleware('verifyphone', 'verifield');
Route::view('/spanish', 'spanish')->middleware('verifyphone', 'verifield');

Route::get('user/verify/{token}', 'Api\AuthController@verifyUser');
Route::middleware('auth:api')->get('uploads/users/{name}', 'UploadController@sexyFile');

Route::get('/categories', 'FrontController@categories')->name('categories_page');
Route::get('/category/{slug}', 'FrontController@category')->name('category.show');

Route::get('/terms/', 'FrontController@terms')->name('terms');

Route::get('/privacy-policy', 'FrontController@privacy')->name('privacy');
Route::get('/dmca-policy', 'FrontController@dmca_policy')->name('dmcapolicy');
Route::get('/cookies', 'FrontController@cookies')->name('cookies');

Route::get('/payment-terms', 'FrontController@paymentterms')->name('paymentterms');


Route::post('/ajax/login', 'FrontController@ajaxLogin');
Route::post('/register/user', 'AuthController@userRegister')->name('register_user_login');
Route::post('/register/user-horoscope', 'AuthController@userHoroscopeRegister')->name('user_horoscope_register');
Route::post('/register/weekly-horoscope', 'AuthController@userweeklyHoroscopeRegister')->name('weekly_horoscope_register');
Route::post('/register/user10offer', 'AuthController@userRegister10offer');
Route::post('/register/psychic', 'AuthController@postRegister')->name('register_login');
Route::post('/register/validate/step1', 'AuthController@validateStep1')->name('validate_step1');
Route::post('/register/validate/step2', 'AuthController@validateStep2')->name('validate_step2');
Route::post('/register/validate/step3', 'AuthController@validateStep3')->name('validate_step3');



Auth::routes();
Route::get('/loginoffer10', 'Auth\LoginController@loginOffer10')->name('login_offer_10');
Route::post('/loginoffer10', 'Auth\LoginController@loginOffer10Attempt')->name('login_offer_10_attempt');
Route::get('/login90daysinactive', 'Auth\LoginController@login90DaysInactive')->name('login_90_days_inactive');
Route::post('/login90daysinactive', 'Auth\LoginController@login90DaysInactiveAttempt')->name('login_90_days_inactive_attempt');

// backend routes
Route::get('/dashboard', 'PsychicController@dashboard')->name('dashboard');

Route::get('/dashboard/menu', 'PsychicController@dashboard_menu')->name('dashboard_menu');
Route::get('/dashboard/user/menu', 'UserController@dashboard_menu')->name('dashboard_menu');

Route::get('/dashboard/profile', 'PsychicController@psychicProfile')->name('psychic_profile');

Route::get('/dashboard/user/profile', 'UserController@userProfile')->name('user_profile');

Route::get('/dashboard/services', 'PsychicController@services')->name('dashboard_services');

Route::get('/dashboard/reviews', 'PsychicController@psychicReviews')->name('psychic_reviews');
Route::get('/dashboard/payout', 'PsychicController@payout_method')->name('dashboard_payout_method');
Route::get('/dashboard/cosmic-rewards', 'PsychicController@cosmicRewards')->name('dashboard_cosmic_rewards');
Route::get('/dashboard/analytics', 'PsychicController@psychicAnalytics')->name('dashboard_analytics');

Route::get('/dashboard/user/reviews', 'UserController@reviews')->name('dashboard_reviews');
Route::get('/review/{token}/{aid}', 'ReviewController@write_review_from_email')->name('write_reviews');

Route::get('/dashboard/transaction', 'UserController@transaction')->name('dashboard_transaction');

Route::get('/dashboard/favorites', 'UserController@favorites')->name('dashboard_favorites');

Route::get('/dashboard/appointments', 'UserController@userAppointments')->name('user_dashboard_appointments');
//Route::get('/dashboard/emails', 'UserController@fromEmails')->name('user_dashboard_appointments');

Route::get('/dashboard/payment', 'UserController@userPayment')->name('user_dashboard_payment');

Route::get('/dashboard/notifications', 'UserController@notifications')->name('dashboard_notifications');


Route::get('/special-offer', 'FrontController@specialOffer')->name('psychic_redirect_special_offer');

Route::get('/verify/phone', 'FrontController@verificationForm')->name('phone_verification');

Route::get('/unsubscribe/{token}', 'FrontController@unsubscribe')->name('unsubscribe');

Route::get('/press', 'FrontController@press')->name('press_page');

Route::get('/horoscope', 'FrontController@horoscope')->name('horoscope_page');
Route::get('/weekly-horoscope', 'FrontController@weeklyHoroscope')->name('weekly_horoscope_page');
Route::get('/horoscopes', function () {
    return redirect('/horoscope');
});


Route::get('/horoscope/{slug}', 'FrontController@zodiacSign')->name('zodiac_sign_page');

Route::get('/top-rated-online-psychics', 'SeoController@topRatedOnlinePsychics')->name('topRatedOnlinePsychics');
Route::get('/psychics-that-accept-paypal', 'SeoController@psychicsThatAcceptPaypal')->name('psychicsThatAcceptPaypal');
Route::get('/call-with-a-psychic', 'SeoController@callWithAPsychic')->name('callWithAPsychic');
Route::get('/clairvoyant-chat', 'SeoController@clairvoyantChat')->name('clairvoyantChat');
Route::get('/astrology-reading-online', 'SeoController@astrologyReadingOnline')->name('astrologyReadingOnline');
Route::get('/love-psychic-online', 'SeoController@lovePsychicOnline')->name('lovePsychicOnline');
Route::get('/online-love-psychic-reading-free', 'SeoController@onlineLovePsychicReadingFree')->name('onlineLovePsychicReadingFree');
Route::get('/online-psychic-free-reading', 'SeoController@onlinePsychicFreeReading')->name('onlinePsychicFreeReading');
Route::get('/how-to-talk-to-a-psychic-for-free', 'SeoController@howToTalkToAPsychicForFree')->name('howToTalkToAPsychicForFree');
Route::get('/palm-reading-online-free', 'SeoController@palmReadingOnlineFree')->name('palmReadingOnlineFree');
Route::get('/spiritual-healer', 'SeoController@spiritualHealer')->name('spiritualHealer');
Route::get('/tarot-psychic-readings', 'SeoController@tarotPsychicReadings')->name('tarotPsychicReadings');
Route::get('/video-psychic', 'SeoController@videoPsychic')->name('videoPsychic');
Route::get('/chakra-psychic', 'SeoController@chakraPsychic')->name('chakraPsychic');
Route::get('/aura-psychic', 'SeoController@auraPsychic')->name('auraPsychic');
Route::get('/most-gifted-psychics', 'SeoController@mostGiftedPsychics')->name('mostGiftedPsychics');
Route::get('/physic-advisor', 'SeoController@physicAdvisor')->name('physicAdvisor');
Route::get('/psychic-blog', 'SeoController@psychicBlog')->name('psychicBlog');



Route::get('/signup/{link_psychic?}', 'FrontController@signUpPage')->name('sign_up_page');
Route::get('/signup10offer', 'FrontController@signUpPage10offer')->name('register_10_offer');
//Text Chat
Route::get('/chat', 'ChatController@index')->name('chat.index');

//Route::view('/search', 'frontend/search')->name('search');

Route::get('/search', 'FrontController@search')->name('search_page');

Route::get('/front/logout', 'FrontController@logout')->name('front_logout');


Route::group(['middleware' => 'auth:web'], function () {

    Route::get('/admin/users-cvs', 'AdminController@getUsersCvs')->name('admin.user_cvs');
    Route::get('/admin/horoscope-users-cvs', 'AdminController@getHoroscopeUsersCvs')->name('admin.user_cvs');
    Route::get('/admin/users-service-cvs', 'AdminController@getUsersServiceCvs')->name('admin.user_service_cvs');
    Route::get('/admin/payout-cvs', 'AdminController@getPayoutCvs')->name('admin.payout_cvs');
    Route::get('/admin/transaction-cvs', 'AdminController@getTransactionCvs')->name('admin.payout_cvs');
    Route::get('/admin/marketing-cvs', 'AdminController@getMarketingCvs')->name('admin.payout_cvs');
    Route::get('/admin/{route?}/{route2?}', 'AdminController@index')->name('admin');
});

//change-agency
Route::get('/agency', 'AdminController@agency')->name('agency.index');
Route::get('/agency/{route?}/{route2?}', 'AdminController@agency')->name('agency.admin');

Route::prefix('generic')->group(function () {
        
    Route::post('list', 'GenericController@list')->name('generic.list');

    Route::post('item', 'GenericController@item')->name('generic.item');

    Route::post('/update/video_status_view', 'GenericController@video_status_view')->name('generic.video_status_view');
    
    Route::get('/get_video_status_view', 'GenericController@get_video_status_view')->name('generic.get_video_status_view');

});

Route::get('/join/{display_name}', 'FrontController@signUpPage')->name('sign_up_page.join');
Route::get('/pa/{code}', 'FrontController@paulaRedirect')->name('paula.redirect');
Route::get('/sitemap.xml', 'FrontController@sitemap')->name('sitemap');
Route::get('/{display_name}/{review?}', 'FrontController@specialtie')->name('specialtie.ptofile');
Route::get('/service-worker.js', function () {
    return response(file_get_contents(asset('/service-worker.js')), 200, [
        'Content-Type' => 'text/javascript',
        'Cache-Control' => 'public, max-age=3600',
    ]);
});







