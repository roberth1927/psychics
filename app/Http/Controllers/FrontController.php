<?php

namespace App\Http\Controllers;

use App\Http\Resources\v1\CategoryResource;
use App\Http\Resources\v1\CategoryResourceCollection;
use App\Http\Resources\v1\CategorySearchResource;
use App\Http\Resources\v1\CategorySearchResourceCollection;

use App\Http\Resources\v1\HoroscopeZodiacSignsResource;
use App\Http\Resources\v1\HoroscopeZodiacSignsResourceCollection;

use App\Http\Resources\v1\HoroscopeInfoResource;
use App\Http\Resources\v1\HoroscopeInfoResourceCollection;

use App\Http\Resources\v1\BlogEtcPostsResource;
use App\Http\Resources\v1\BlogEtcPostsResourceCollection;

use App\Http\Resources\v1\PsychicProfileResource;
use App\Http\Resources\v1\PsychicResource;
use App\Http\Resources\v1\ReviewBasicResourceCollection;
use Validator;
use App\Models\Post;
use App\Models\User;
use App\Models\Review;
use App\Services\ApiUtils;

use App\Services\WebUtils;
use App\Models\Country_all;
use Jenssegers\Agent\Agent;
use App\Models\ProfileViews;
use App\Services\WhiteLabel;
use Illuminate\Http\Request;
use App\Services\TwilioUtils;
use Camroncade\Timezone\Timezone;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\v1\UserBasicResource;
use App\Models\Category;
use App\Models\BlogEtcPosts;

use App\Models\HoroscopeZodiacSigns;
use App\Models\HoroscopeInfo;


use App\Models\Specialties;
use App\Models\Styles;
use App\Models\Tools;
use App\Models\UserCreditLog;
use Camroncade\Timezone\TimezoneServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Redirect;
use Storage;

use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware('verifyphone')->except('verificationForm', 'ajaxLogin', 'sitemap');
        $this->middleware('verifield')->except('ajaxLogin', 'sitemap');
        $this->middleware('checkgclid')->except('ajaxLogin', 'sitemap');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $qreview = Review::where('featured_landing_paula', 1)->get();
        return view('frontend.home')->with(['user' => Auth::user(), 'guest' => Auth::guest(), 
        'home' => true, 'unsubscribe'=>false,
        'reviews' => new ReviewBasicResourceCollection($qreview)]);
    }


    public function get5Free()
    {

        return view('frontend.get5_free')->with(['user' => Auth::user(), 'guest' => Auth::guest()]);
    }


    public function newClientPromo()
    {

        return view('frontend.new-client-promo')->with(['user' => Auth::user(), 'guest' => Auth::guest()]);
    }

    public function verificationForm(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect("/");
        }
        $phoneNumber = $user->user_mobile_nums()->first();

        if ($phoneNumber->validated) {
            return redirect("/");
        }
        $country_obj = new Country_all();
        $country_all = $country_obj->get_all_countries();



        if ($phoneNumber && !is_null($phoneNumber->code2) && !is_null($phoneNumber->number) && !empty($phoneNumber->code2) && !empty($phoneNumber->number)) {
            if (is_null($phoneNumber->verification_code) || empty($phoneNumber->verification_code)) {

                $code = rand(1000, 9999); //generate random code
                $phoneNumber->verification_code = $code; //save code
                $phoneNumber->save();

                TwilioUtils::send_verification_sms($phoneNumber, $user);
            }
            $message = "Code Sent to: <b>+" . $phoneNumber->prefix . $phoneNumber->number . "</b>";
            return view('frontend.verify_phone')->with(array('notice' => $message, 'phone' => $phoneNumber, 'user' => new UserBasicResource($user), 'redirect' => $request->session()->get('redirect_url')));
        } else {
            $message = "Please update your phone number, we will text you a verification code.";
            return view('frontend.add_verify_phone')->with(array('notice' => $message, 'phone' => $phoneNumber, 'user' => new UserBasicResource($user), 'country_all' => $country_all, 'redirect' => $request->session()->get('redirect_url')));
        }
    }

    public function psychicRedirect(Request $request)
    {


        $REFERER = $request->server('HTTP_REFERER');
        if (!is_null($REFERER) && !empty($REFERER)) {
            session(['redirect' => $REFERER]);
        }

        return redirect("/apply");
    }

    public function model($slug)
    {


        return view('frontend.model')->with(['slug' => $slug, 'user' => Auth::user(), 'guest' => Auth::guest()]);
    }

    public function categories()
    {
        return view('frontend.categories');
    }


    public function favorites()
    {
        if (Auth::check()) {
            return view('frontend.favorites')->with(['user' => Auth::user(), 'guest' => Auth::guest()]);
        } else {
            return redirect("/login");
        }
    }

    public function helpfuls()
    {
        if (Auth::check()) {
            return view('frontend.helpfuls')->with(['user' => Auth::user(), 'guest' => Auth::guest()]);
        } else {
            return redirect("/login");
        }
    }

    public function ajaxLogin(Request $request)
    {


        if (Auth::check()) {
            return ApiUtils::response_success();
        }

        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        $request->merge([
            'email' => trim($request->email),
            'password' => trim($request->password),
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (!$user) {
            return ApiUtils::response_fail_mobile_num(['email'=>['account not found']],"The given data was invalid."); 
            //return ApiUtils::response_fail('These credentials do not match our records.');
        }

        if ($user['account_status'] == 'ADMIN_DISABLED') {
            return ApiUtils::response_fail('Your account is disabled. Please contact support@collide.com for assistance');
        }

        if (!$user->email_validated)
            return ApiUtils::response_fail('Inactive Login - please contact support@psychics1on.com for assistance.', 401);

        $check90Days = !$user->isPsychic() ? $user->last_log_in->diffInDays(Carbon::today()) >= 90 :  !$user->isPsychic();
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            if ($check90Days) {
              $PROMO = 10;
              $user_credit_log = new UserCreditLog();
              $user_credit_log->site_id = WhiteLabel::site_id();
              $user_credit_log->credits = $PROMO;
              $user_credit_log->action = 'Inactive';
              $user_credit_log->credits_old = $user->credits;
              $user->user_credit_logs()->save($user_credit_log);
              $user->credits += $PROMO;
              $user->save();
            }

            $role = $user->role_id;
            $url = "/login";
            $url_intended =  FacadesSession::get('url.intended', url('/'));
            if ($role == WhiteLabel::roleId('Admin') || $role == WhiteLabel::roleId('Agency') || $role == WhiteLabel::roleId('Support') || $role == WhiteLabel::roleId('Horoscope')  || $user->email == 'blake@psychics1on1.com' || $user->email == 'account@psychics1on1.com') {
                $url =  '/admin';
            }
            elseif ($role == WhiteLabel::roleId('Blog')) { //change-agency
                // $url = $url_intended;
                $url = '/agency';
            } elseif ($role == WhiteLabel::roleId('Psychic')) {
                // $url = $url_intended;
                $url = '/dashboard';
            } elseif ($role == WhiteLabel::roleId('User')) {
                $url = $url_intended;
                //$url =  null;//reload same page
            }

            if ($request->session()->has('redirect')) {
                $url = session('redirect');
                $request->session()->forget('redirect');
            }

            if ($user->email_validated) {
                return ApiUtils::response_success(['success' => true, 'url' => $url], $this->successStatus);
            }
        }
        return ApiUtils::response_fail_mobile_num(['password'=>['password does not match our records']],"The given data was invalid."); 
        //return ApiUtils::response_fail('Invalid email/password, please try again');
    }

    public function terms()
    {


        /*$users = User::all();

        foreach ($users as $user){

            if(!is_null($user->userProfile()->first())){
                $profile = $user->userProfile()->first();
                $display_name = WebUtils::seoUrl($profile->display_name);
                $profile->display_name = $display_name;
                $profile->save();
            }

        }*/

        return view('frontend.terms');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }
    public function dmca_policy()
    {
        return view('frontend.dmca_policy');
    }


    public function paymentterms()
    {
        return view('frontend.payment-terms');
    }
    public function cookies()
    {
        return view('frontend.cookies');
    }

    
    public function specialtie($display_name, $review = null)
    {

        $user = User::select('user.id', 'user.profile_percent')->join('user_profile', 'user.id', '=', 'user_profile.user_id')
            ->where('user_profile.profile_link', $display_name)
            ->where('user.email_validated', 1)
            ->where('user.account_status', "ACTIVE")
            ->where('user.role_id', '=', WhiteLabel::roleId('Psychic'))
            ->get()->first();

          
        


        if (is_null($user) && Auth::user()['role_id'] == WhiteLabel::roleId('Admin')) {

            $user = User::select('user.id', 'user.profile_percent')->join('user_profile', 'user.id', '=', 'user_profile.user_id')
            ->where('user_profile.profile_link', $display_name)
            ->where('user.role_id', '=', WhiteLabel::roleId('Psychic'))
            ->get()->first();

        }

        if(is_null($user)) {
            return redirect("/");  
        }

        //Check thumbnail   
        if($user->userProfile->intro_video_path){
            $in = [
                'key'         => 'user-profile/' . $user->id . '/',
                'source_file' => $user->userProfile->intro_video_path,
                
                'content_type' => 'image/jpeg',
            ];
            WhiteLabel::s3existThumbnail('assets', $in);
    }

        $user_loged = Auth::id();
        if (is_null($user_loged)) {
            $user_loged = 0;
            $loged_user_role = 0;
        } else {
            $loged_user_role = Auth::user()['role_id'];
        }


        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if (!$pageWasRefreshed) {
            $proView = new ProfileViews();
            $user->psychic_profile_views()->save($proView);
        }

        $timezone = new Timezone();
        $timezone_list = $timezone->getFormattedTimezones();
        $current_user_timezone = null;
        $current_user_appointment_count = 0;

        if (!is_null(Auth::user())) {
            $current_user_appointment_count = Auth::user()->user_appointments()->count();
            $current_user_timezone = Auth::user()->userProfile()->first()->timezone;
        }

        $agent = new Agent();

        $browser = $agent->browser();

        $allow = true;
        if ($agent->isDesktop() || $agent->isAndroidOS()) {

            if ($browser == 'Chrome' || $browser == 'Firefox') {
                $allow = true;
            }
        } elseif ($agent->is('iPhone') && $browser == 'Safari') {
            $allow = true;
        }

        $profile_bio = substr($user->user_profile->description, 0, 157) . '...';


        return view('frontend/specialtie-profile', [
            'id' => $user->id,
            'current_user' => $user_loged,
            'current_user_role' => $loged_user_role,
            'current_user_timezone' => $current_user_timezone,
            'current_user_appointment_count' => $current_user_appointment_count,
            'timezones' => $timezone_list,
            'review' => $review,
            'browserAllow' => $allow,
            'browser' => $browser,
            'profile_link' => $display_name,
            'profile_name' => $user->user_profile->display_name,
            'profile_bio' => $profile_bio
        ]);
    }
    public function specialtiesRedirect(){
        return redirect("/#specialties");  
    }
    public static function countries_all()
    {

        $country_obj = new Country_all();
        return $country_obj->get_all_countries();
    }

    public function press()
    {
        return view('frontend.press');
    }


    public function horoscope()
    {
        $blogs = new BlogEtcPostsResourceCollection(BlogEtcPosts::where('is_published', '=', 1 )->where("posted_at", "<=", Carbon::now())->offset(0)->limit(2)->orderBy('posted_at', 'DESC')->get()); 
        return view('frontend.horoscope')->with(array('blogs' => json_encode($blogs))) ;
    }
    public function weeklyHoroscope()
    {
        $blogs = new BlogEtcPostsResourceCollection(BlogEtcPosts::where('is_published', '=', 1 )->where("posted_at", "<=", Carbon::now())->offset(0)->limit(19)->orderBy('id', 'DESC')->get()); 
        return view('frontend.weeklyHoroscope')->with(array('blogs' => json_encode($blogs))) ;
    }

    public function zodiacSign(Request $request)
    {

        $horoscope = HoroscopeZodiacSigns::select('horoscope_zodiac_signs.*')
        ->where('horoscope_zodiac_signs.slug',$request->slug)
        ->get()->first();

        $info = HoroscopeInfo::select('horoscope_info.*')
        ->where('horoscope_info.horoscope_zodiac_signs_id',$horoscope->id)
        ->whereDate('horoscope_info.start_week','<=', date('Y-m-d'))
        ->whereDate('horoscope_info.end_week','>=', date('Y-m-d'))
        // ->whereRaw('( ? >= horoscope_info.start_week AND ? <= horoscope_info.end_week) ',[date('Y-m-d'),date('Y-m-d')])
        // ->where('horoscope_info.end_week','<=',date('Y-m-d'))
        ->get()->first();

        $country_obj = new Country_all();
        $country_all = $country_obj->get_all_countries();
        
        $horoscope = new HoroscopeZodiacSignsResource($horoscope);
        
        if($info) $info = new HoroscopeInfoResource($info);

        
        
        return view('frontend.zodiac_sign')->with(array('horoscope' => $horoscope, 
                                                        'sign' => $request->slug,
                                                        'info' => json_encode($info),
                                                        'country_all' => json_encode($country_all),
                                                        'datetoday' => json_encode(
                                                            array('d'=>date('d'),
                                                                'm'=>date('F'),
                                                                'y'=>date('Y')
                                                        ))));
                                            


    }

    

    public function signUpPage(Request $request, $link_psychic = "")
    {

        if (Auth::check()) {
            return redirect("/dashboard");
        }
        
        if($request->display_name){

            $referral = User::select('user.id')->join('user_profile', 'user.id', '=', 'user_profile.user_id')
            ->where('user_profile.profile_link', $request->display_name)
            ->get()->first();

            if($referral)
            session(['join_id' => $referral->id]);

        }

      
        $country_obj = new Country_all();
        $country_all = $country_obj->get_all_countries();
        return view('frontend.page_signup')->with(array('country_all' => $country_all, "link_psychic" => $link_psychic));
    }
    public function signUpPage10offer(Request $request)
    {

        if (Auth::check()) {
            return redirect("/dashboard");
        }
        
        if($request->display_name){

            $referral = User::select('user.id')->join('user_profile', 'user.id', '=', 'user_profile.user_id')
            ->where('user_profile.profile_link', $request->display_name)
            ->get()->first();

            if($referral)
            session(['join_id' => $referral->id]);

        }


        $country_obj = new Country_all();
        $country_all = $country_obj->get_all_countries();
        return view('frontend.page_signup10offer')->with(array('country_all' => $country_all));
    }

    public function search(Request $request)
    {

        $seo_ability = null;
        
        
        if(!empty($request->input("ability"))){

            $abilities = explode(",",$request->input("ability"));
            if(count($abilities) == 1){
                $seo_ability =  Category::where('slug', $abilities[0])->first();
            }
        }
        
        

        return view('frontend/search', ['terms' => $request->all(), 'abilities'=> new CategorySearchResourceCollection(Category::all()), 'search' => true, 'seo_ability'=> $seo_ability]);
    }

    public function searchAbilities(Request $request, $slug)
    {
        $seo_ability =  Category::where('slug', $slug)->first();

        return view('frontend/categories_search', ['terms' => $request->all(), 'abilities'=> new CategorySearchResourceCollection(Category::all()), 'search' => true, 'seo_ability'=> $seo_ability, "slug" => $slug]);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect("/");
    }

    public static function abilities()
    {

        return Category::all();
    }

    public static function specialties()
    {

        return Specialties::all();
    }

    public static function tools()
    {

        return Tools::all();
    }

    public static function styles()
    {

        return Styles::all();
    }


    public function activity($slug)
    {

        return redirect("/search?ability=".$slug);
    }

    public function specialOffer()
    {
        $url = "http://3psychic.pagedemo.co/";    
        return Redirect::away($url);
        
    }

    public function unsubscribe(Request $request)
    {
        
        $deleted = DB::delete('delete from user_horoscope where MD5(email) = "'.$request->token.'"');
        $qreview = Review::where('featured_landing_paula', 1)->get();
        
        return view('frontend.home')->with(['user' => Auth::user(), 'guest' => Auth::guest(),
        'unsubscribe' => true, 
        'reviews' => new ReviewBasicResourceCollection($qreview)]);
        
        
    }

    public function tarotReading()
    {
        $q = User::whereIn('user.id', [2049, 2506, 96, 92, 1539, 15550])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'tarot-card-reading-lp',
                'seo_ability'=>null
            ]);
    }

    public function astrology()
    {
        $q = User::whereIn('user.id', [198, 12586, 15393, 16044, 11703, 267])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'astrology',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'astrology')->first())
            ]);
    }

    public function palmReading()
    {
        $q = User::whereIn('user.id', [15550, 238, 3847, 16044, 1252, 167])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'palm-reading',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'palm-reading')->first())
            ]);
    }

    public function medium()
    {
        $q = User::whereIn('user.id', [9793, 2506, 282, 2049, 16044, 15393])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'medium',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'medium')->first())
            ]);
    }

    public function clairvoyant()
    {
        $q = User::whereIn('user.id', [282, 2506, 12540, 6349, 16307, 7112])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'clairvoyant',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'clairvoyant')->first())
            ]);
    }

    public function spiritualHealinglp()
    {
        $q = User::whereIn('user.id', [1539, 6349, 96, 5576, 16307, 4591])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'spiritual-healer',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'spiritual-healer')->first())
            ]);
    }

    public function psychiclp()
    {
        $q = User::whereIn('user.id', [1252, 96, 92, 2049, 5253, 12540])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'psychic',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'psychic')->first())
            ]);
    }

    public function tarotCardReading()
    {
        $q = User::whereIn('user.id', [1252, 96, 92, 5253, 3847, 12415])->get(); // id from prod

        return view('frontend.landing-categories')
            ->with([
                'psychics'=>PsychicResource::collection($q),
                'category_slug'=>'tarot-card-reading',
                'seo_ability'=> new CategorySearchResource(Category::where('slug', 'tarot-card-reading')->first())
            ]);
    }

    
    public function paulaabdulLanding(Request $request)
    {
        $q = User::whereIn('user.id', [92, 96, 7112, 1252, 19112, 2049, 15393, 12415])->orderBy('user.priority', 'desc')->get(); // id from prod
        $qrated = User::whereIn('user.id', [6349, 282, 2506, 5576, 198, 19972, 1539, 18297, 344])->orderBy('user.priority', 'desc')->get(); // id from prod
        $qreview = Review::where('featured_landing_paula', 1)->get();

        
        $request->session()->put('source_paula', "paula_signup");
        

        return view('frontend.landing-paulaabdul')
            ->with([
                'user' => Auth::user(),
                'guest' => Auth::guest(),
                'top_psychics'=>PsychicResource::collection($q),
                'top_rated_psychics'=>PsychicResource::collection($qrated),
                'reviews'=>new ReviewBasicResourceCollection($qreview)
            ]);
        
    }

    public function paulaabdulLandingVideo(Request $request)
    {
        $q = User::whereIn('user.id', [92, 96, 7112, 1252, 19112, 2049, 15393, 12415])->orderBy('user.priority', 'desc')->get(); // id from prod
        $qrated = User::whereIn('user.id', [6349, 282, 2506, 5576, 198, 19972, 1539, 18297, 344])->orderBy('user.priority', 'desc')->get(); // id from prod
        $qreview = Review::where('featured_landing_paula', 1)->get();

        
        $request->session()->put('source_paula', "paula_signup");
        

        return view('frontend.landing-paulaabdul-video')
            ->with([
                'user' => Auth::user(),
                'guest' => Auth::guest(),
                'top_psychics'=>PsychicResource::collection($q),
                'top_rated_psychics'=>PsychicResource::collection($qrated),
                'reviews'=>new ReviewBasicResourceCollection($qreview)
            ]);
        
    }
    
    
    public function sitemap()
    {
        //dd('asdads');
        $psychics = User::select('user.id','user.updated_at')->join('user_profile', 'user.id', '=', 'user_profile.user_id')
        ->where('user.role_id', 1)
        ->where('user.email_validated', 1)
        ->where('user.account_status', 'ACTIVE')
        ->where('user.test_user', 0)
        ->where('user.fraud', 0)
        ->where('user.profile_percent', '!=', 0)
        //->where('user.lost_requests', '<', 10)
        ->where('user_profile.haedshot_path', '!=', '')
        ->groupBy('user.id')
        ->get();
    
        $posts = BlogEtcPosts::where('is_published', 1)->where("posted_at", "<=", Carbon::now())->get();
        

        return response()->view('frontend.sitemap', ['psychics' => $psychics, 'posts' => $posts])->header('Content-Type', 'text/xml');
    }

    public function paulaRedirect(Request $request)
    {
       return redirect("/paulaabdul");
    }
    
}
