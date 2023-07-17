<?php

namespace App\Http\Controllers;


use App\Http\Resources\v1\CategoryResourceCollection;
use App\Models\Category;
use App\Models\Country;
use App\Models\Country_all;
use App\Models\States;
use Camroncade\Timezone\Timezone;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\BillingUtils;
use App\Models\UserCreditLog;
use App\Http\Resources\v1\UserCreditLogsResourceCollection;
use Carbon\Carbon;
use App\Services\WhiteLabel;

class UserController extends Controller
{
    public function __construct(Guard $auth)
    {

        $this->middleware('auth');
        $this->middleware('role:2')->except(['notifications']); //change later to user role
        $this->middleware('verifyphone');
        $this->middleware('verifield');
        $this->auth = $auth;
    }

    public function payout_method(Request $request)
    {
        //return view('frontend.model')->with(['id'=> $id, 'user'=> Auth::user(), 'guest'=> Auth::guest()]);

        return view('backend.payout_method');
    }

    public function userAppointments(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today();
        if($user->userProfile->birth_date){
            $birthday = Carbon::createFromFormat('Y-m-d',  $user->userProfile->birth_date);
            if (($birthday->format('m') === $today->format('m')) && ($birthday->format('d') === $today->format('d'))) {
            if (count($user->user_credit_logs->where('created_at', '>=', $today->format('Y-m-d'))->where('action', 'birthday')) === 0) {
                $user_credit_log = new UserCreditLog();
                $user_credit_log->site_id = WhiteLabel::site_id();
                $user_credit_log->credits_old = $user->credits;
                $user_credit_log->credits = 10;
                $user_credit_log->action = 'birthday';
                $user->user_credit_logs()->save($user_credit_log);
                $user->credits += 10;
                $user->save();
            }
            }
        }
        
        $apid = $request->get('apid') ? $request->get('apid') : '';
        $categories = new CategoryResourceCollection(Category::all());
        return view('backend.user_dashboard', [
            'link' => 0,
            'categories' => $categories,
            'apid' => $apid
        ]);
    }

    public function dashboard_menu()
    {

        return view('backend.dashboard_menu')->with(['link' => 5]);;
    }


    public function reviews()
    {
        return view('backend.dashboard_reviews')->with(['link' => 1]);
    }

    public function transaction()
    {

        $credit_logs =  Auth::user()->user_credit_logs()->orderBy('created_at', 'DESC')->get();

        $logs = new UserCreditLogsResourceCollection($credit_logs);

        $user = Auth::user();

        return view('backend.dashboard_transaction')->with(['transactions' => $logs, 'link' => 4, 'name' => $user->userProfile->name . ' ' . $user->userProfile->last_name]);
    }

    public function favorites()
    {
        return view('backend.dashboard_favorites')->with(['link' => 2]);
    }

    public function userProfile()
    {
        $timezone = new Timezone();
        $timezone_list = $timezone->getTimezones();
        $countries = Country::all();
        $states = States::all();

        $country_obj = new Country_all();
        $country_all = $country_obj->get_all_countries();
        return view('backend.user_profile')->with([
            'countries' => $countries, 'states' => $states,
            'link' => '', 'timezones' => $timezone_list, 'country_all' => $country_all
        ]);
    }
    public function userPayment()
    {

        $user = Auth::user();

        $card = '';
        $cards = BillingUtils::get_user_cards($user->id, $card);

        return view('backend.user.payment')->with(['cards' => $cards, 'link' => 5]);
    }
    public function notifications()
    {
        $user = Auth::user();
        return view('backend.notifications')->with(['user' => $user, 'link' => '']);;
    }
}
