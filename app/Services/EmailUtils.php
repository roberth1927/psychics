<?php

namespace App\Services;

use App\Mail\AddBirthday;
use App\Models\User;
use App\Mail\BlogEmail;
use App\Mail\RblMarked;
use App\Mail\DailyReport;
use App\Mail\CreditsOffer;
use App\Mail\WellcomeUser;
use App\Mail\PsychicPaypal;
use App\Mail\RequestReview;
use App\Mail\ResetPassword;
use App\Mail\FlashSaleEmail;
use App\Mail\NoLogged30Days;
use App\Mail\PsychicProfile;
use App\Mail\ReviewReceived;
use App\Mail\PayoutInitiated;
use App\Mail\PurchaseCredits;
use App\Mail\SpanishPsychics;
use App\Mail\Day10ClientEmail;
use App\Mail\Day20ClientEmail;
use App\Mail\Day45ClientEmail;
use App\Mail\FeaturesPsychics;
use App\Mail\FirstMessageFree;
use App\Mail\Day14PsychicsTips;
use App\Mail\NewReadingRequest;
use App\Mail\Specialties30Days;
use App\Mail\Day3PurchaseCredit;
use App\Mail\Day7PurchaseCredit;
use App\Mail\AfterRegister24Hour;
use App\Mail\BeginYourReadingNow;
use App\Mail\ClientReadingBooked;
use App\Mail\Day7PsychicsSuccess;
use App\Mail\UserTopRatePsychics;
use App\Mail\FirstPurchaseCredits;
use App\Mail\MarketingClientEmail;
use App\Mail\AnnouncementHoroscopeEmail;
use App\Mail\ReferralEmail;
use App\Mail\PsychicLaunchEmail;
use App\Mail\WeeklyHoroscopeEmail;
use App\Mail\MarketingPsychicEmail;
use App\Mail\ClientWishesReschedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientIsReadyForReading;
use App\Mail\clientsFinancial;
use App\Mail\clientsFinancialNew;
use App\Mail\clientsLove;
use App\Mail\clientsLoveNew;
use App\Mail\clientsMedium;
use App\Mail\clientsMediumNew;
use App\Mail\cosmicRewardsClient;
use App\Mail\cosmicRewardsPsychic;
use App\Mail\DaysInactive90;
use App\Mail\GiftBirthday;
use App\Mail\PsychicIsReadyForReading;
use App\Mail\WeeklyHoroscopeSignEmail;
use App\Mail\newScheduleReadingRequest;
use App\Mail\PsychicProfileMissingFields;
use App\Mail\PurchaseCreditsOffer;
use App\Mail\WellcomeUserPaula;

class EmailUtils
{

    public static function send_to_user_when_reading_booked($appointment)
    {
        //12 Goes to client when their appointment has been booked
        //AppointmentController  updateAppointmentStatus()
        Mail::to($appointment->user()->first()->email)->send(new ClientReadingBooked($appointment));  
    }    
    public static function send_to_user_when_register($user_created)
    {
        //08 Goes to clients immediately after signup
        // AuthController  registerUser
        Mail::to($user_created->email, $user_created->UserProfile()->first()->name)->send(new WellcomeUser($user_created));
    } 
    public static function send_to_user_when_psychic_is_ready_to_initiate_service($user_1_1_chat_request)
    {
        //14 Goes to client when Psychic is ready for to inititate video chat or calling session 
        // UserController  model_vchat_start()

        Mail::to($user_1_1_chat_request->user()->first()->email)->send(new BeginYourReadingNow($user_1_1_chat_request));  
    } 
    public static function send_to_psychic_when_user_request_service($appointment,$now_or_later)
    {
        //15 Goes to Psychic when client has requested to schedule video chat or calling session 
        //AppointmentController  createAppointment()
        if($now_or_later == 'later'){
            Mail::to($appointment->psychic()->first()->email)->send(new newScheduleReadingRequest($appointment)); 
        }else{
            Mail::to($appointment->model()->first()->email)->send(new NewReadingRequest($appointment)); 
        }
         
    } 
    public static function send_to_psychic_when_user_is_ready_to_reading($appointment)
    {
        //16 Goes to Psychic when scheduled video chat or calling session is ready to begin 
        //  ()
        Mail::to($appointment->psychic()->first()->email)->send(new ClientIsReadyForReading($appointment));
        // Mail::to($appointment->user()->first()->email)->send(new PsychicIsReadyForReading($appointment));    
    } 
    public static function send_to_psychic_when_user_reschedules_service($new_appointment,$old_appointment)
    {
        //18 Goes to Psychic when client reschedules a scheduled call or chat, they will need to confrim or deny 
        // AppointmentController  editUserAppointment()
        Mail::to($new_appointment->psychic()->first()->email)->send(new ClientWishesReschedule($new_appointment,$old_appointment));  
    }

    public static function send_to_clients_credits_offer($user)
    {
        //18 Goes to Psychic when client reschedules a scheduled call or chat, they will need to confrim or deny
        // AppointmentController  editUserAppointment()
        Mail::to($user->email)->send(new CreditsOffer($user));
        //var_dump($user->email);
    }
    public static function send_to_clients_purchase_credits_offer($user)
    {
        //18 Goes to Psychic when client reschedules a scheduled call or chat, they will need to confrim or deny
        // AppointmentController  editUserAppointment()
        Mail::to($user->email)->send(new PurchaseCreditsOffer($user));
        //var_dump($user->email);
    }
    public static function send_to_clients_with_no_birthday($user)
    {
        //18 Goes to Psychic when client reschedules a scheduled call or chat, they will need to confrim or deny
        // AppointmentController  editUserAppointment()
        Mail::to($user->email)->send(new AddBirthday($user));
        //var_dump($user->email);
    }
    public static function send_to_clients_birthday_gift($user)
    {
        //18 Goes to Psychic when client reschedules a scheduled call or chat, they will need to confrim or deny
        // AppointmentController  editUserAppointment()
        Mail::to($user->email)->send(new GiftBirthday($user));
        //var_dump($user->email);
    }
    public static function send_to_psychic_when_payout_is_created($user,$payoutDetails)
    {
        Mail::to($user->email)->queue( new PayoutInitiated($user, $payoutDetails));
        //Mail::to($user->email)->send(new PayoutInitiated($user,$payoutDetails));
        //var_dump($user->email);
    }
    public static function send_to_client_when_request_review($appointment)
    {
        //# Goes to client when Psychic selects request review
        Mail::to($appointment->user()->first()->email)->queue( new RequestReview($appointment));
    }


    public static function spanish_psychics_send_to_all($user)
    {
        //# Goes to client when Psychic selects request review
        Mail::to($user->email)->queue( new SpanishPsychics($user));
    }
    public static function send_email_to_users_after_one_day_after_register_first_message_free($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new FirstMessageFree($user));
    }
    public static function send_email_to_psychic_when_received_review($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new ReviewReceived($user));
    }

    public static function send_email_to_user_features_psychics($user, $subject, $psychic)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new FeaturesPsychics($user, $subject, $psychic));
    }

    public static function send_email_to_user_top_rate_psychics($user, $subject, $psychics, $reviews)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new UserTopRatePsychics($user, $subject, $psychics, $reviews));
    }

    public static function send_email_to_first_purchase_credits($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new FirstPurchaseCredits($user));
    }

    public static function send_email_to_purchase_credits($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new PurchaseCredits($user));
    }

    public static function send_email_to_no_logged_30_days($user, $users)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new NoLogged30Days($user, $users));
    }

    public static function send_daily_report()
    {
        //# Goes to client after 1 day register
        Mail::to('jl@justindlevine.com')->cc([
            'avi@telxcomputers.com',
            'henry@teachers1on1.com',
            'km@collide.com'
        ])->send( new DailyReport());

    }

    public static function send_blog_email($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->send( new BlogEmail($user));

    }

    public static function day_7_purchase_credit($user)
    {
        Mail::to($user->email)->queue( new Day7PurchaseCredit($user));
    }

    public static function day_3_purchase_credit($user)
    {
        Mail::to($user->email)->queue( new Day3PurchaseCredit($user));
    }

    public static function weekly_hroscope_email($user, $subject, $signs, $psychics, $reviews)
    {
        Mail::to($user->email)->queue( new WeeklyHoroscopeEmail($user, $subject, $signs, $psychics, $reviews));
    }

    public static function weekly_horoscope_sign_email($user, $subject, $signs, $info, $psychics,$reviews)
    {
       Mail::to($user->email)->queue( new WeeklyHoroscopeSignEmail($user, $subject, $signs, $info,$psychics,$reviews));
    }

    public static function psychic_profile($user)
    {
        Mail::to($user->email)->queue( new PsychicProfile($user));
    }

    public static function send_email_24_hour_after_register($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new AfterRegister24Hour($user));
    }

    public static function send_email_10_day_after_client_register($user, $users)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new Day10ClientEmail($user, $users));
    }

    public static function send_email_20_day_after_client_register($user, $users)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new Day20ClientEmail($user, $users));
    }

    public static function send_email_45_day_after_client_register($user, $users)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new Day45ClientEmail($user, $users));
    }

    public static function send_email_psychic_profile_missing_details($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new PsychicProfileMissingFields($user));
    }


    public static function send_email_to_specialties_30_days($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new Specialties30Days($user));

    }

    public static function send_email_to_psychics__7days($user, $images, $titles, $texts)
    {
        //# Goes to psychic after 7 day register
        Mail::to($user->email)->queue( new Day7PsychicsSuccess($user, $images, $titles, $texts));
    }

    public static function send_email_to_psychics__14days($user, $images, $titles, $texts)
    {
        //# Goes to psychic after 7 day register
        Mail::to($user->email)->queue( new Day14PsychicsTips($user, $images, $titles, $texts));
    }

    public static function send_email_marketing_psychic($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new MarketingPsychicEmail($user));
    }

    public static function send_email_marketing_client($user)
    {
        //# Goes to client after 1 day register
        Mail::to($user->email)->queue( new MarketingClientEmail($user));
    }

    public static function send_announcement_horoscope_email($user)
    {
        Mail::to($user->email)->queue( new AnnouncementHoroscopeEmail($user));
    }

    public static function send_referral_email($user,$email)
    {
        Mail::to($email)->queue( new ReferralEmail($user,$email)); 
        
    }   
    
    
    public static function send_psychic_launch_email($user,$email)
    {
        Mail::to($email)->queue( new PsychicLaunchEmail($user,$email)); 
        
    }   
    public static function send_reset_password_email($token)
    {
        $email = request()->email;
        if($user = User::where('email', $email)->first()){        
            Mail::to($email)->queue( new ResetPassword($token, $user));
        }
    }

    public static function send_paypal_psychic($user)
    {
        Mail::to($user->email)->send(new PsychicPaypal($user));  
    }

    public static function flash_sale_email($user, $promoCode)
    {
        Mail::to($user->email)->send(new FlashSaleEmail($user, $promoCode));  
    }

    public static function days_inactive_90($user)
    {
        Mail::to($user->email)->send(new DaysInactive90($user));  
    }
    public static function cosmic_rewards_client($user)
    {
        Mail::to($user->email)->send(new cosmicRewardsClient($user));  
    }
    public static function cosmic_rewards_psychic($user)
    {
        Mail::to($user->email)->send(new cosmicRewardsPsychic($user));  
    }
    public static function clients_medium($user, $users)
    {
        Mail::to($user->email)->send(new clientsMedium($user, $users));  
    }
    public static function clients_medium_new($user, $users)
    {
        Mail::to($user->email)->send(new clientsMediumNew($user, $users));  
    }
    public static function clients_financial($user, $users)
    {
        Mail::to($user->email)->send(new clientsFinancial($user, $users));  
    }
    public static function clients_financial_new($user, $users)
    {
        Mail::to($user->email)->send(new clientsFinancialNew($user, $users));  
    }
    public static function clients_love($user, $users)
    {
        Mail::to($user->email)->send(new clientsLove($user, $users));  
    }
    public static function clients_love_new($user, $users)
    {
        Mail::to($user->email)->send(new clientsLoveNew($user, $users));  
    }

    public static function rbl_marked($user)
    {
        Mail::to($user->email)->send( new RblMarked($user));
    }

    public static function send_to_user_when_register_paula($user_created)
    {
        Mail::to($user_created->email, $user_created->UserProfile()->first()->name)->send(new WellcomeUserPaula($user_created));
    } 
    
}