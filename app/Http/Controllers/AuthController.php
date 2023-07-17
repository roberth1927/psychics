<?php
namespace App\Http\Controllers;
use App\Mail\SendGridMail;
use App\Models\Country_all;
use App\Models\PromoCode;
use App\Models\UserCredentials;
use App\Models\UserWorks;
use App\Models\UserLanguages;
use App\Models\UserCreditLog;
use App\Models\UserProfile;
use App\Models\UserService;
use App\Models\UserReferral;
use App\Services\CacheUtils;
use App\Services\WhiteLabel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserHoroscope;
use App\Models\UserFavoritePsychics;

use App\Models\VerifyUser;
use App\Models\UserMobileNum;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiUtils;
use App\Services\WebUtils;
use App\Services\TwilioUtils;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\Cast\Object_;
use App\Mail\RegisterSuccessEmail;
use App\Models\OfferEmailNew;
use App\Services\EmailUtils;

use Validator;



class AuthController extends Controller
{

    public $successStatus = 200;
    public $statusCreated = 201;

    public function __construct(Guard $auth/*,Register $registrar*/)
    {
        $this->auth = $auth;
        $this->create_user = null;
        $this->token = '';

    }

    public function postLogin(Request $request){


        if (Auth::check()) {
            return ApiUtils::response_success();
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $key) {
                $errors[$key] = $validator->errors()->first($key);
            }
            return ApiUtils::response_fail_data('Please correct and try again.', $errors);
        }

        $request->merge([
            'email' => trim($request->email),
            'password' => trim($request->password),
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if (!$user) {
            return ApiUtils::response_fail_data('Invalid email/password, please try again');
        }
       ;
        if ($user['account_status'] == 'ADMIN_DISABLED') {
            return ApiUtils::response_fail('Your account is disabled. Please contact support@collide.com for assistance');
        }

        if ($this->auth->attempt($request->only('email', 'password'), $request->has('remember'))) {

            if($user->email_validated){

               $success['token'] =  $user->createToken('Sexy1on1')->accessToken;
               $success['type'] =  'Bearer';
               return ApiUtils::response_success(['success' => $success], $this->successStatus);
                }else{

                return ApiUtils::response_fail(['message'=>'Please Verify Email'], 401);
                }


        }

        if ($this->auth->attempt(['username' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            $success['token'] =  $user->createToken('Sexy1on1')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);

           /* if($user->email_validated ){
                $success['type'] =  'Bearer';
                $success['token'] =  $user->createToken('Sexy1on1')->accessToken;

            return response()->json(['success' => $success], $this->successStatus);
                 }else{
                 return response()->json(['message'=>'Please Verify Email'], 401);
                 }*/

        }
        return ApiUtils::response_fail_data('Invalid email/password, please try again');


    }

    public function postRegister(Request $request, $test_mode = false) {



        $this->validate($request, [
            'name' => 'required',
            'last_name'=>'required',
            'code' => 'required',
            'number' => WebUtils::verifyPhone([(object)['number' => $request->input('number')]]) ? 'required|numeric|regex:/[0-9]{10}/' : 'required|numeric|regex:/[0-9]{10}/|unique:user_mobile_num',
            'email' => ['required', 'email', 'unique:user',  new \App\Rules\emailValidator(), 'bail'],
            'categories' => 'required|array|min:1|max:4',
            'tools' => 'required|array|min:1|max:3',
            'specialties' => 'required|array|min:1|max:4',
            'styles' => 'required|array|min:1|max:1',
            /*'display_name' => 'required|min:3|unique:user_profile|regex:/^[a-zA-Z0-9_-]*$/',*/
            'display_name' => "required|min:3|max:46|unique:user_profile|regex:/^[a-z\d\-_.\s]+$/i",
            /*'referral' => 'required',*/
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'age' => 'accepted',
        ]);

        if(!WebUtils::verifyIp($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Your signup could not be completed. Please contact support with error O1C7JM']],"The given data was invalid.");
        }

        if(!WebUtils::verifyRecaptcha($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Contact our support team for assistance']],"The given data was invalid.");
        }

        if(!$this->validate_number($request)){
            return ApiUtils::response_fail_mobile_num(['number'=>['Mobile number is invalid']],"The given data was invalid.");         
         }    
        

        if (!empty($request['email'])) {
            $request['email'] = trim($request['email']);
        }
        if (!empty($request['name'])) {
            $request['name'] = trim($request['name']);
        }
        if (!empty($request['last_name'])) {
            $request['last_name'] = trim($request['last_name']);
        }
        if (!empty($request['password'])) {
            if( is_array($request['password']) ) {
                $request['password'] = trim($request['password'][1]);   // idk
            }
            $request['password'] = trim($request['password']);
        }


        $input = $request->toArray();
        //$request['from_postRegister']=true;

       $this->register($input, $test_mode);

       $request->session()->put('redirect_url', route('psychic_profile'));//to redirect same page user  

       $request->merge([
            'email' => trim($request->email),
            'password' => trim($request->password),
        ]);

        if(Auth::attempt($request->only('email', 'password')))
         return ApiUtils::response_success(['message'=> 'login'], $this->statusCreated);


        $status= 'Check your email for a note from us and get ready to earn some game-changing income.';

        return ApiUtils::response_success(['message'=> $status], $this->statusCreated);

    }   
    public function userRegister(Request $request, $test_mode = false) {

        $this->validate($request, [
            'code' => 'required',
            //'number' => 'required|numeric|regex:/[0-9]{10}/|unique:user_mobile_num',
            'number' => WebUtils::verifyPhone([(object)['number' => $request->input('number')]]) ? 'required|numeric|regex:/[0-9]{10}/' : 'required|numeric|regex:/[0-9]{10}/|unique:user_mobile_num',
            'email' => ['required', 'email', 'unique:user',  new \App\Rules\emailValidator(), 'bail'],
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'age' => 'accepted',
            'promo_code' => 'nullable|exists:promo_code,code',
            'birth_date' => ($request['subscribe_horoscope']?'required|':'nullable|').'date_format:m/d/Y|before:18 years ago',
        ]);


        if(!WebUtils::verifyIp($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Your signup could not be completed. Please contact support with error O1C7JM']],"The given data was invalid.");
        }


        if(!WebUtils::verifyRecaptcha($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Contact our support team for assistance']],"The given data was invalid.");
        }


        if(!$this->validate_number($request)){
            return ApiUtils::response_fail_mobile_num(['number'=>['Mobile number is invalid']],"The given data was invalid.");         
         }  
        if (!empty($request['email'])) {
            $request['email'] = trim($request['email']);
        }
        if (!empty($request['name'])) {
            $request['name'] = trim($request['name']);
        }

        if (!empty($request['password'])) {
            if( is_array($request['password']) ) {
                $request['password'] = trim($request['password'][1]);   // idk
            }
            $request['password'] = trim($request['password']);
        }


        $input = $request->toArray();
        //$request['from_postRegister']=true;
        $input['join_id'] = session('join_id');


        $this->registerUser($input, $test_mode);

        if ($request['subscribe_horoscope']) {
            $request['name'] = $request->email;

            if (!empty($request['email'])) {
                $this->validate($request, [
                    'email' => ['required', 'email', 'unique:user_horoscope',  'bail'],
                ]);
            }

            if ( empty($request['email']) ) {
                return ApiUtils::response_fail_mobile_num(['age'=>['Oops, email required']],"The given data was invalid.");               
            }
            
            if (!empty($request['name'])) {
                $request['name'] = trim($request['name']);
            }

            if($request['birth_date']){
                $date = new \DateTime($request['birth_date']);
                $birth_date  = $date->format('Y-m-d');
            }

            $user = new UserHoroscope();
            $user->email = $request['email'];
            $user->birth_date = $birth_date;
            $user->name = $request['name'];
            $user->email_validated = true;

            $user->save();
        }

        $status= '';

        $request->merge([
            'email' => trim($request->email),
            'password' => trim($request->password),
        ]);
  
        $request->session()->put('redirect_url', session()->previousUrl());//to redirect same page user  
        
        if(Auth::attempt($request->only('email', 'password')))
         return ApiUtils::response_success(['message'=> 'login'], $this->statusCreated);

        return ApiUtils::response_success(['message'=> $status], $this->statusCreated);

    }
    public function userRegister10offer(Request $request, $test_mode = false) {

          $this->validate($request, [
            'code' => 'required',
            //'number' => 'required|numeric|regex:/[0-9]{10}/|unique:user_mobile_num',
            'number' => WebUtils::verifyPhone([(object)['number' => $request->input('number')]]) ? 'required|numeric|regex:/[0-9]{10}/' : 'required|numeric|regex:/[0-9]{10}/|unique:user_mobile_num',
            'email' => ['required', 'email', 'unique:user',  new \App\Rules\emailValidator(), 'bail'],
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'age' => 'accepted',
            'promo_code' => 'nullable|exists:promo_code,code',
        ]);


        if(!WebUtils::verifyIp($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Your signup could not be completed. Please contact support with error O1C7JM']],"The given data was invalid.");
        }


        if(!WebUtils::verifyRecaptcha($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Contact our support team for assistance']],"The given data was invalid.");
        }


        if(!$this->validate_number($request)){
            return ApiUtils::response_fail_mobile_num(['number'=>['Mobile number is invalid']],"The given data was invalid.");         
        }  
        if (!empty($request['email'])) {
            $request['email'] = trim($request['email']);
        }
        if (!empty($request['name'])) {
            $request['name'] = trim($request['name']);
        }

        if (!empty($request['password'])) {
            if( is_array($request['password']) ) {
                $request['password'] = trim($request['password'][1]);   // idk
            }
            $request['password'] = trim($request['password']);
        }


        $input = $request->toArray();
        //$request['from_postRegister']=true;
        $input['join_id'] = session('join_id');


        $this->registerUser($input, $test_mode);

        $check = OfferEmailNew::where('email', $request->email)->first();
        if ($check && $check->confirmed == 0) {

            $PROMO = 10;
            $change = User::where('email', $request->email)->first();
            $change->credits += $PROMO;
            $change->save();
            $check->confirmed = 1;
            $check->save();
            
              $user_credit_log = new UserCreditLog();
              $user_credit_log->site_id = WhiteLabel::site_id();
              $user_credit_log->credits = 0;
              $user_credit_log->promo = $PROMO;
              $user_credit_log->action = 'FREE_CREDITS';
              $user_credit_log->credits_old = $change->credits;
              $change->user_credit_logs()->save($user_credit_log);
              $change->save();
        }

        $status= '';

        $request->merge([
            'email' => trim($request->email),
            'password' => trim($request->password),
        ]);
  
        $request->session()->put('redirect_url', session()->previousUrl());//to redirect same page user  
        
        if(Auth::attempt($request->only('email', 'password')))
         return ApiUtils::response_success(['message'=> 'login'], $this->statusCreated);

        return ApiUtils::response_success(['message'=> $status], $this->statusCreated);

    }

    public function userHoroscopeRegister(Request $request, $test_mode = false) {

        $status= '';
        $this->validate($request, [
            'age' => 'accepted',
            'name' => 'required',
            'birth_date' => 'required',
        ]);
        


        // if(!WebUtils::verifyRecaptcha($request)){
        //     return ApiUtils::response_fail_mobile_num(['spam'=>['Contact our support team for assistance']],"The given data was invalid.");
        // }

        
      

        if (!empty($request['email'])) {

            $this->validate($request, [
                'email' => ['required', 'email', 'unique:user_horoscope',  'bail'],
            ]);

            $request['email'] = trim($request['email']);



        }


        if (!empty($request['number'])) {

            $this->validate($request, [
                'number' => 'required|numeric|regex:/[0-9]{10}/|unique:user_horoscope',
            ]);
            if(!$this->validate_number($request)){
                return ApiUtils::response_fail_mobile_num(['number'=>['Mobile number is invalid']],"The given data was invalid.");         
             }  

        }

        if ( (empty($request['email'])) && (empty($request['number'])) ) {


            return ApiUtils::response_fail_mobile_num(['age'=>['Oops, email or mobile required']],"The given data was invalid.");   
                  
            
        }


        
        if (!empty($request['name'])) {
            $request['name'] = trim($request['name']);
        }


        // $request['accepted_terms']=null;
        // if (isset($request['terms_agree']) || isset($request['from_facebook'])){
        //     if ($request['terms_agree'] =='on' || isset($request['from_facebook']) ){
        //         $request['accepted_terms']=date('Y-m-d H:i:s');
        //     }
        // }
        if($request['birth_date']){
            $date = new \DateTime($request['birth_date']);
            $birth_date  = $date->format('Y-m-d');
        }


        $country  = Country_all::where('id', $request['code'])->first();
        $country_code = $country->prefix;


        $user = new UserHoroscope();
        $user->email = $request['email'];
        $user->birth_date = $birth_date;
        $user->name = $request['name'];
        $user->country_code = $country_code;
        $user->number = $request['number'];
        $user->email_validated = true;

        if ($user->save())
        return response()->json(['success' => $user], $this->statusCreated);
          
        
        
        return response()->json(['message' => 'error'], $this->successStatus);
        
        
        
        

    }
    
    public function userweeklyHoroscopeRegister(Request $request, $test_mode = false) {
      $status= '';
      if (!empty($request['email'])) {
          $this->validate($request, [
              'email' => ['required', 'email', 'unique:user_horoscope',  'bail'],
          ], [
              'email.unique' => 'This email was already subscribed',
          ]);
          $request['email'] = trim($request['email']);
      }
      if (empty($request['email'])) {
          return ApiUtils::response_fail_mobile_num(['age'=>['Oops, email required']],"The given data was invalid.");   
      }

      $user = new UserHoroscope();
      $user->email = $request['email'];
      $user->name = "name";
      $user->country_code = "1";

      if ($user->save()) {
        return response()->json(['success' => $user->email], $this->statusCreated);
      }
      return response()->json(['message' => 'error'], $this->successStatus);
  }

    public function getUser() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    private function register($user_data,$test_mode = false) {

     

        $user_data['accepted_terms']=null;
        if (isset($user_data['terms_agree']) || isset($user_data['from_facebook'])){
            if ($user_data['terms_agree'] =='on' || isset($user_data['from_facebook']) ){
                $user_data['accepted_terms']=date('Y-m-d H:i:s');
            }
        }

        if ( !isset($user_data['content_level'])
            || (isset($user_data['content_level'])
                && !in_array($user_data['content_level'] ,WhiteLabel::config('user')->content_levels)))
        {
            $user_data['content_level'] = 'NO RESTRICTION';
            if (isset($user_data['all_ages']) || isset($user_data['from_facebook']))
            {
                if (isset($user_data['from_facebook']) || $user_data['all_ages'] == 'on')
                {
                    $user_data['content_level'] = 'ALL AGES ONLY';
                }
            }
        }
     

        $this->create_user = $this->create($user_data);

        $country  = Country_all::where('id', $user_data['code'])->first();

        $in= [
            'user_id'=>$this->create_user->id,
            'number'=> $user_data['number'],
            'code2' => $country->code2,
            'prefix' => $country->prefix
        ];
        $user_mobile_num = UserMobileNum::create($in);
        if (!$this->create_user)
        {
            return ['internal' => 'Sorry, an error occurred creating account'];
        }
        if (!$user_mobile_num)
        {
            return ['internal' => 'Sorry, an error occurred adding phone number to account'];
        }
        $verifyUser = VerifyUser::create([
            'user_id' => $this->create_user->id,
            'token' => sha1(time()),
        ]);

        Mail::to($this->create_user->email, $this->create_user->UserProfile()->first()->name)->send(new RegisterSuccessEmail($this->create_user));

        $this->create_user->save();

        return null;
    }

    private function registerUser($user_data,$test_mode = false) {



        $usre_data['accepted_terms']=null;
        if (isset($user_data['terms_agree']) || isset($user_data['from_facebook'])){
            if ($user_data['terms_agree'] =='on' || isset($user_data['from_facebook']) ){
                $user_data['accepted_terms']=date('Y-m-d H:i:s');
            }
        }

        if ( !isset($user_data['content_level'])
            || (isset($user_data['content_level'])
                && !in_array($user_data['content_level'] ,WhiteLabel::config('user')->content_levels)))
        {
            $user_data['content_level'] = 'NO RESTRICTION';
            if (isset($user_data['all_ages']) || isset($user_data['from_facebook']))
            {
                if (isset($user_data['from_facebook']) || $user_data['all_ages'] == 'on')
                {
                    $user_data['content_level'] = 'ALL AGES ONLY';
                }
            }
        }


        $this->create_user = $this->createUser($user_data);

        $country  = Country_all::where('id', $user_data['code'])->first();

        $in= [
            'user_id'=>$this->create_user->id,
            'number'=> $user_data['number'],
            'code2' => $country->code2,
            'prefix' => $country->prefix
        ];
        $user_mobile_num = UserMobileNum::create($in);
        if (!$this->create_user)
        {
            return ['internal' => 'Sorry, an error occurred creating account'];
        }
        if (!$user_mobile_num)
        {
            return ['internal' => 'Sorry, an error occurred adding phone number to account'];
        }
        $verifyUser = VerifyUser::create([
            'user_id' => $this->create_user->id,
            'token' => sha1(time()),
        ]);
        
        if ($this->create_user->source_paula) {
            EmailUtils::send_to_user_when_register_paula($this->create_user);
        } else {
            EmailUtils::send_to_user_when_register($this->create_user);
        }


        //EmailUtils::send_to_clients_credits_offer($this->create_user);

        $user  = $this->create_user->save();




       

        return null;
    }

    protected function create(array $data)
    {

        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = WhiteLabel::config('user')->roles['Psychic'];

        $user->commission = 30;

       /* if(isset($data['referral'])){
            $user->referred_by = $data['referral'];
        }*/
        $user->email_validated = true;
        $user->save();

        $profile = new UserProfile();
        $profile->name = $data['name'];

        $profile->last_name = $data['last_name'];
        $profile->display_name = trim($data['display_name']);

        $profile->profile_link = WebUtils::seoUrl($data['display_name']);


        /*if(isset($data['social_link_one'])){
            $profile->social_link_one = $data['social_link_one'];
        }
        if(isset($data['social_link_two'])){
            $profile->social_link_two = $data['social_link_two'];
        }*/


        $profile->user()->associate($user);
        $profile->save();



        $credential = new UserCredentials();
        $credential->user()->associate($user);
        $credential->save();

        

        $work = new UserWorks();
        $work->user()->associate($user);
        $work->save();

        $language = new UserLanguages();
        $language->languages_id = 43;
        $language->user()->associate($user);
        $language->save();


        for ($i = 1; $i <= 3; $i ++){
            $userService = new UserService();
            $userService->user()->associate($user);
            $userService->service_id = $i;

            if ($i == 1) {
                $userService->min_duration=5;
                $userService->rate=2;
            }
            elseif ($i == 2) {                
                $userService->rate=1;
            }
            elseif ($i == 3) {                
                $userService->min_duration=5;
                $userService->rate=5;
            }

            $userService->save();
        }

        $user->categories()->sync($data['categories']);
        $user->specialties()->sync($data['specialties']);
        $user->tools()->sync($data['tools']);
        $user->styles()->sync($data['styles']);
        $user->save();
        return $user;


    }

    protected function createUser(array $data)
    {

       

        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = WhiteLabel::config('user')->roles['User'];

        //$user->credits = 10;
        $user->email_validated = true;
        $user->referred_by_user = $data['join_id'];
        $user->online_announcement_cosmic_client = 1;
        
        if ($data['subscribe_horoscope']) {
            $user->horoscope_subscribed = 1;
        }else{
            $user->horoscope_subscribed = 0;
        }

        if(isset($data['promo_code'])){
            $promo = PromoCode::where('code', $data['promo_code'])->where('status', 1)->first();
            if($promo){
                $user->credits += $promo->credits;
                $user->promo_code_id = $promo->id;
                $promo->times_used += 1;

                if($promo->times_used == $promo->max_use){
                    $promo->status = 0;
                }
                $promo->save();
            }
        }

        if(session('gclid') !== null){
            $user->gclid = session('gclid');
            session()->forget('gclid');
        }

        if(session('fbclid') !== null){
            $user->fbclid = session('fbclid');
            session()->forget('fbclid');
        }


        if(session('source_paula') !== null){
            $user->source_paula = true;
            session()->forget('source_paula');
        }


        $user->save();
        
        $username = explode('@', $data['email']);
        $username = $username[0];

        $profile = new UserProfile();
        $profile->name = $username;

        //$profile->last_name = $data['last_name'];
        $display_name = WebUtils::seoUrl($username."-".uniqid());
        $profile->display_name = $display_name;

        $profile->profile_link = $display_name;

        if($data['birth_date']){
            $date = new \DateTime($data['birth_date']);
            $birth_date  = $date->format('Y-m-d');
            $profile->birth_date = $birth_date;
        }


        $profile->user()->associate($user);
        $profile->save();


        if($user->referred_by_user){

            $user_referral = new UserReferral();
            $user_referral->referral_email = $user->email;
            $user_referral->user_id = $user->referred_by_user;
            $user_referral->referral_id = $user->id;
            $user_referral->action = 'Invite Accepted';
            $user_referral->save();

            $user_favorite = new UserFavoritePsychics();
            $user_favorite->user_id = $user->id;
            $user_favorite->psychic_id = $user->referred_by_user;
            $user_favorite->save();
            $user->online_announcement_cosmic_client = 0;
            $user->save();
            
        }



        /*$creditLog = new UserCreditLog();
        $creditLog->user_id = $user->id;
        $creditLog->credits = $user->credits;
        $creditLog->action = "Free Credits";
        $creditLog->save();*/

        return $user;


    }
    private function validate_number($request){

        $country  = Country_all::where('id', $request->input('code'))->first();
        $number = $country->prefix.$request->input('number');
        $check_number = TwilioUtils::is_valid_number($number,$request->input('code')) || WebUtils::verifyPhone([(object)['number' => $request->input('number')]]);      
        return $check_number; 
         
    }


    public function validateStep1(Request $request, $test_mode = false) {

        $this->validate($request, [
            'name' => 'required',
            'last_name'=>'required',
            'code' => 'required',
            'number' => WebUtils::verifyPhone([(object)['number' => $request->input('number')]]) ? 'required|numeric|regex:/[0-9]{10}/' : 'required|numeric|regex:/[0-9]{10}/|unique:user_mobile_num',
            'email' => ['required', 'email', 'unique:user',  new \App\Rules\emailValidator(), 'bail'],
            'display_name' => "required|min:3|max:46|unique:user_profile|regex:/^[a-z\d\-_.\s]+$/i",
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'age' => 'accepted',
        ]);

        if(!WebUtils::verifyIp($request)){
            return ApiUtils::response_fail_mobile_num(['spam'=>['Your signup could not be completed. Please contact support with error O1C7JM']],"The given data was invalid.");
        }

        if(!$this->validate_number($request)){
            return ApiUtils::response_fail_mobile_num(['number'=>['Mobile number is invalid']],"The given data was invalid.");         
         }    
        

        $status= 'Check your email for a note from us and get ready to earn some game-changing income.';

        return ApiUtils::response_success(['message'=> $status], $this->statusCreated);

    }
    
    
    public function validateStep2(Request $request, $test_mode = false) {

        $this->validate($request, [
            'categories' => 'required|array|min:1|max:4',
            'tools' => 'required|array|min:1|max:3',
        ]);

     

         $status= 'Step 2 validated';

        return ApiUtils::response_success(['message'=> $status], $this->statusCreated);

    } 

    
    public function validateStep3(Request $request, $test_mode = false) {

        $this->validate($request, [
            'specialties' => 'required|array|min:1|max:4',
            'styles' => 'required|array|min:1|max:3',
        ]);

       
        $status= 'Step 3 validated';

        return ApiUtils::response_success(['message'=> $status], $this->statusCreated);

    } 

}
