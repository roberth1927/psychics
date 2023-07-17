<?php namespace App\Http\Controllers\Api;




use Carbon\Carbon;
use App\Models\User;
use CreateUserReferral;
use App\Models\Languages;
use App\Services\ApiUtils;
use App\Models\UserReferral;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Illuminate\Http\Request;
use App\Models\UserCreditLog;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Services\NotificationUtils;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\v1\LanguagesResourceCollection;
use App\Http\Resources\v1\PsychicCreditLogsResourceCollection;

class PsychicController extends Controller {

    public function __construct(Guard $auth)
    {
        $this->middleware('auth:api');
        $this->middleware('role:1')->except('referralEmail','referralEmailResend');
        $this->middleware('verifield');
        $this->auth = $auth;
    }
    public function UpdatePsychic(Request $request)
    {

       
        $this->validate($request, [
            'period' => ['string', Rule::in(['Monthly','Daily'])],
            'goal'=> 'integer|min:1'
        ]);

         
        $user = Auth::user();
        $period =  $request->input('period');
        $goal =  $request->input('goal');
        
        if($period && $goal){
            if($period == 'Monthly'){
              
                $user->earnings_goal_month = $goal;
            }else{
               
                $user->earnings_goal_daily = $goal;
            }

            $user->save();

            return ApiUtils::response_success('OK',Response::HTTP_OK);

        }

       
    }

    public function referralEmail(Request $request)
    {


        $request->validate([
            'referral_email' => ['required', 'email', 'unique:user_referral',  'bail'],
        ]);
        
        if (!empty($request['referral_email'])) {
            $request['referral_email'] = trim($request['referral_email']);
        }
        
        $check = User::where('email',$request['referral_email'])->first();
        if(!$check){
            $user = Auth::user();
            $user_referral = new UserReferral();
            $user_referral->referral_email = $request['referral_email'];
            $user_referral->user_id = $user->id;
            $user_referral->action = 'Invite Sent';

            if ($user_referral->save()){
                    EmailUtils::send_referral_email($user,$request['referral_email']);
                    return response()->json(['message'=> 'Sent Email'], 200);
                }
        }
        
        return response()->json(['message'=> 'An invitation has been sent to this email'], 400);
        
        
    }


    public function referralEmailResend(Request $request)
    {
        $user = Auth::user();

        $user_referral = UserReferral::where(array('id' => $request['line']))->first();
        if ($user_referral->action == "Invite Accepted") {
          return response()->json(['message'=> 'User accepted'], 200);
        }
        
        if ($user_referral->action == "Invite Resend") {
          $user_referral->action = 'Invite Resend';
          $user_referral->save();
        }

        EmailUtils::send_referral_email($user,$request['referral_email']);
        return response()->json(['message'=> 'Sent Email'], 200);


    }
    

    public function getLanguages(Request $request)
    {
        $languages = new LanguagesResourceCollection(Languages::where('status','1')->get());
       
        return response()->json($languages, 200);


    }
    
    public function getCreditLog(Request $request){

        $query = UserCreditLog::where('psychic_id', Auth::user()->id);
        if($range = $request->range){
            list($from, $to) = explode('/', $range);
            $query->whereBetween('user_credit_log.created_at', [new Carbon($from), new Carbon($to)]);
        }
        if($services = $request->services){
            $query->where(function ($query) use ($services) {
                foreach (explode(',', $services) as $service) {
                    $query->orWhere('user_credit_log.action', '=', $service);
                }
            });
        }
        return new PsychicCreditLogsResourceCollection( $query->orderBy('created_at', 'DESC')->paginate($request->get('per_page', 25)) );
    }

}
