<?php

namespace App\Services;

use App\Events\NotificationsInAppEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsInAppUtils
{


    public static function f_to_psychics_when_new_scheduled_appointment($appointment){
  
        $data = NotificationsInAppUtils::f_array_to_psychics_when_new_scheduled_appointment($appointment,'model');
        broadcast(new NotificationsInAppEvent($data))->toOthers();	
     }
     public static function f_to_user_when_create_new_scheduled_appointment_pending($appointment){
  
      $data = NotificationsInAppUtils::f_array_to_user_when_new_scheduled_appointment_pending($appointment,'user');
      broadcast(new NotificationsInAppEvent($data));	
   }
     public static function f_to_user_when_psychic_canceled_request_or_expired($user_1_1_request,$to_whom,$action){
  
      $data = NotificationsInAppUtils::f_array_to_user_when_psychic_canceled_request_or_expired($user_1_1_request,$to_whom,$action);
      broadcast(new NotificationsInAppEvent( $data ))->toOthers();   

      }

      public static function f_to_user_when_psychic_canceled_or_expired_appointment($appointment,$to_whom){
  
        $data = NotificationsInAppUtils::f_array_to_user_when_psychic_canceled_sheduled_appointment($appointment,$to_whom);
        broadcast(new NotificationsInAppEvent( $data ))->toOthers();   
  
        }
        //Done
        public static function f_to_psychic_when_user_canceled_appointment($appointment,$to_whom){
  
          $data = NotificationsInAppUtils::f_array_to_psychic_when_user_canceled_sheduled_appointment($appointment,$to_whom);
          broadcast(new NotificationsInAppEvent( $data ))->toOthers();   
    
          }
          public static function f_array_to_psychic_when_user_canceled_sheduled_appointment($appointment,$to_whom){
            
            if($appointment->service_id == 1){
              $first_image = '/images/icons/notifications/call_grey.svg';
              }else{
              $first_image = '/images/icons/notifications/video_grey.svg';
              }
             
            $data = [
              'from' => $appointment->user->userProfile->name,
              'profile_headshot_url' => $appointment->user->userProfile->haedshot_path,
              'action_description' => 'Client Cancelled',
              'request_description' => $appointment->service->name.', '.$appointment->category->name,
              'first_image' => $first_image,
              'first_text' => 'Delete',
              'second_image' => '',
              'second_text' => '',
              'state' => 'appointment',
              'action' => 'to_psychic_schedule_appointment_cancelled',
              'color' => 'color_blue',
              'close'=> false,
              'updated' => $appointment->updated_at,
              'online' => 0,
               
            'user_id'=>$appointment->psychic_id,         
            'state' => 'appointment',
           
            'id'=>'appointment-'.$appointment->id,
            'key'=>$appointment->id,
          ];
      
          return $data;
           }

          public static function f_to_psychic_when_user_canceled_request($user_1_1,$to_whom){
  
            $data = NotificationsInAppUtils::f_array_to_psychic_when_user_canceled_request($user_1_1,$to_whom);
            broadcast(new NotificationsInAppEvent( $data ))->toOthers();   
      
          }
          //Done
          public static function f_array_to_psychic_when_user_canceled_request($user_1_1,$to_whom){

            if($user_1_1->service_id == 1){
              $first_image = '/images/icons/notifications/call_grey.svg';
              }else{
              $first_image = '/images/icons/notifications/video_grey.svg';
              }
            $data = ['user_id'=>$user_1_1->model_id, 
            'from' => $user_1_1->user->userProfile->name,
            'profile_headshot_url' => $user_1_1->user->userProfile->haedshot_path,
            'action_description' => 'Client Cancelled',
            'request_description' => $user_1_1->service->name.', '.$user_1_1->appointment->category->name,
            'first_image' => $first_image,
            'first_text' => 'Delete',
            'second_image' => '',
            'second_text' => '',   
            'color'=>'color_blue',
            'close'=> false,
            'action' => 'to_psychic_user_canceled_request',
            'id'=>'appointment-'.$user_1_1->id,
            'key'=>$user_1_1->id,
            'updated' => $user_1_1->updated_at,
            'online' => 0,
          ];
      
          return $data;
          }
        
    //Done    
   public static function f_array_to_psychics_when_new_scheduled_appointment($appointment,$to_whom){

    $duration = $appointment->duration > 1 ? $appointment->duration.' Minutes' : $appointment->duration. ' Minute';  
    $start = NotificationsInAppUtils::convertTime(
      $appointment->start_hour, 
      $appointment->user->userProfile->timezone, 
      $appointment->psychic->userProfile->timezone
    );
    $hour = date('h:i a', strtotime($start));
    $date = date("F d",strtotime($start));
    
    $name = $appointment->user()->first()->UserProfile()->first()->name;
      $data = ['user_id'=>$appointment->psychic_id,    
      'from' => $name,
      'profile_headshot_url' => $appointment->user->userProfile->haedshot_path,
      'action_description' => $date.', '.$hour.', '.$duration,
      'request_description' => $appointment->service->name.', '.$appointment->category->name,
      'first_image' => '/images/icons/notifications/accept.svg', 
      'first_image_50' => '/images/icons/notifications/accept_50x50.svg',
      'first_text' => 'Accept',
      'second_image' => '/images/icons/notifications/decline.svg',
      'second_image_50' => '/images/icons/notifications/decline_50x50.svg',
      'second_text' => 'Decline',
      'state' => 'appointment',
      'action' => 'schedule_appointment',      
      'color' => '',
      'close'=> false,
      'id'=>'appointment-'.$appointment->id,
      'key'=>$appointment->id,
      'updated' => $appointment->updated_at,
      'online' => 0,
     
      
    ];

    return $data;

   }
   public static function f_to_psychic_when_request_expired($user_1_1,$to_whom){
    $data = NotificationsInAppUtils::f_array_to_psychic_when_request_expired($user_1_1,$to_whom);
    broadcast(new NotificationsInAppEvent( $data ))->toOthers();   

   }
   public static function f_array_to_psychic_when_request_expired($user_1_1_request,$to_whom){
   
    if($user_1_1_request->service_id == 1){
      $first_image = '/images/icons/notifications/call_grey.svg';
      }else{
      $first_image = '/images/icons/notifications/video_grey.svg';
      }
    $data = [
      'user_id'=>$user_1_1_request->model_id,
      'state' => 'request',
      'action' => 'to_psychic_request_expired',       
      'id'=>'request-'.$user_1_1_request->id,
      'key'=>$user_1_1_request->id,
      'link' => '',

      'from' => $user_1_1_request->user->userProfile->name,
      'profile_headshot_url' => $user_1_1_request->user->userProfile->haedshot_path,
      'action_description' => 'Request Expired',
      'request_description' => 'Opportunity Missed',
      'first_image' => $first_image,
      'first_text' => 'Delete',
      'second_image' => '',
      'second_text' => '',
      'color' => 'color_blue',
      'close'=> false,
      'updated' => $user_1_1_request->updated_at,
      'online' => 0,
    ];

    return $data;
   }
   //Done
   public static function f_array_to_user_when_psychic_canceled_request_or_expired($user_1_1_request,$to_whom,$action){
 
          $action_name = '';
          $name = $user_1_1_request->model()->first()->UserProfile()->first()->display_name;         
          if($action == 'expired'){
            $action_name = 'expired_request';          
           
          }
          if($action == 'canceled'){
            $action_name = 'model_canceled_request';
           
          }
         
          $data = [
        'user_id'=>$user_1_1_request->user_id,
        'state' => 'request',
        'action' => $action_name,       
        'id'=>'request-'.$user_1_1_request->id,
        'key'=>$user_1_1_request->id,
        'link' => route('search_page',['category'=>$user_1_1_request->appointment->category_id]),

        'from' => $name,
        'profile_headshot_url' => $user_1_1_request->model->userProfile->haedshot_path,
        'action_description' => 'Psychic Unavailable',
        'request_description' => $user_1_1_request->service->name.', '.$user_1_1_request->appointment->category->name,
        'first_image' => '/images/icons/notifications/discover.svg',
        'first_text' => 'Discover',
        'second_image' => '',
        'second_text' => '',
        'color' => 'color_blue',
        'updated' => $user_1_1_request->updated_at,
        'close'=> true,
        'online' =>  $user_1_1_request->model->online,
      ];

      return $data;

  }
  //Done
  public static function f_array_to_user_when_psychic_canceled_sheduled_appointment($appointment,$to_whom){

 
             $name = $appointment->psychic()->first()->UserProfile()->first()->display_name;
             $data = [
            'user_id'=>$appointment->user_id,            
            'state' => 'appointment',
            'action' => 'model_canceled_appointment',          
            'id'=>'request-'.$appointment->id,
            'key'=>$appointment->id,

            'link' =>route('search_page',['category'=>$appointment->category_id]),
            'from' => $name,
            'profile_headshot_url' => $appointment->psychic->userProfile->haedshot_path,
            'action_description' => 'Psychic Unavailable',
            'request_description' => $appointment->service->name.', '.$appointment->category->name,
            'first_image' => '/images/icons/notifications/discover.svg',
            'first_text' => 'Discover',
            'second_image' => '',
            'second_text' => '',
            'color' => 'color_blue',
            'close'=> true,
            'updated' => $appointment->updated_at,
            'online' =>  $appointment->psychic->online,
        ];

        return $data;

        }
        public static function f_array_to_user_when_new_scheduled_appointment_pending($appointment,$to_whom){

          $duration = $appointment->duration > 1 ? $appointment->duration.' Minutes' : $appointment->duration. ' Minute';           
          $start = $appointment->start_hour;
          $hour = date('h:i a', strtotime($start));
          $date = date("F d",strtotime($start));
          
           $name = $appointment->psychic->UserProfile->display_name;
            $data = ['user_id'=>$appointment->user_id,            
            'from' => $name,
            'profile_headshot_url' => $appointment->psychic->userProfile->haedshot_path,
            'action_description' => $date.', '.$hour.', '.$duration,
            'request_description' => $appointment->service->name.', '.$appointment->category->name,
            'first_image' => '/images/icons/notifications/decline.svg',
            'first_text' => 'Cancel',
            'second_image' => '',
            'second_text' => '',
            'state' => 'appointment',
            'action' => 'user_schedule_appointment_pending',
            'color' => 'color_blue',
            'close'=> false,
            'updated' => $appointment->updated_at,
            'online' =>  $appointment->psychic->online,
            
            
            'button_text' => 'Confirm Now',
            'id'=>'appointment-'.$appointment->id,
            'key'=>$appointment->id,
          ];
      
          return $data;
      
         }
         //Done
         public static function f_to_user_when_psychic_confirm_appointment($appointment, $to_whom){
          $data = NotificationsInAppUtils::f_array_to_user_when_psychic_confirm_appointment($appointment,$to_whom);
          broadcast(new NotificationsInAppEvent( $data ))->toOthers();   
         }
         //Done
         public static function f_array_to_user_when_psychic_confirm_appointment($appointment,$to_whom){
         
          $name = $appointment->psychic()->first()->UserProfile()->first()->display_name;
          $data = [
         'user_id'=>$appointment->user_id,         
         'state' => 'appointment',
         'action' => 'to_user_model_confirm_appointment',        
         'id'=>'request-'.$appointment->id,
         'key'=>$appointment->id,
         'link' =>'',
         'from' => $name,
         'profile_headshot_url' => $appointment->psychic->userProfile->haedshot_path,
         'action_description' => 'Scheduled Reading Booked',
         'request_description' => $appointment->service->name.', '.$appointment->category->name,
         'first_image' => '/images/icons/notifications/decline.svg',
         'first_text' => 'Cancel',
         'second_image' => '',
         'second_text' => '',
         'color' => '',
         'close'=> true,
         'updated' => $appointment->updated_at,
         'online' =>  $appointment->psychic->online,
        ];

         return $data;
         }

         public static function f_to_psychic_when_change_online_offline($user, $to_whom){  
          $data = NotificationsInAppUtils::f_array_to_psychic_when_change_online_offline($user,$to_whom);
          broadcast(new NotificationsInAppEvent( $data ));          
           
         }


         public static function to_announcement_horoscope ($user, $to_whom){  
          $data = NotificationsInAppUtils::f_array_to_announcement_horoscope($user,$to_whom);
          broadcast(new NotificationsInAppEvent( $data ));          
           
         }



         public static function f_array_to_psychic_when_change_online_offline($user,$to_whom){
         
        
          $data = [
         'user_id'=>$user->id,         
         'state' => 'online_rules',
         'action' => 'to_psychic_online_rules',        
         'id'=>'online_rules-'.$user->id,
         'key'=>$user->id,
         'link' =>'https://psychics1on1.zendesk.com/hc/en-us/articles/360045794071-Online-Offline-Response-Time-Rules-',
         'from' => 'New & Improved',
         'profile_headshot_url' => '/images/icons/notifications/online_rules2.png',
         'action_description' => 'New Client Response Time Rules',
         'request_description' => 'Action Necessary',
         'first_image' => '/images/icons/notifications/review.svg',
         'first_text' => 'Review',
         'second_image' => '',
         'second_text' => '',
         'color' => 'color_blue',
         'close'=> false,
         'updated' => $user->updated_at,
         'online' =>  0,
        ];

         return $data;
         }



         public static function f_array_to_announcement_horoscope($user,$to_whom){
         
        
                $data = [
              'user_id'=>$user->id,         
              'state' => 'online_rules',
              'action' => 'to_all_announcement',        
              'id'=>'online_rules-'.$user->id,
              'key'=>$user->id,
              'link' =>'https://psychics1on1.com/horoscope',
              'from' => 'New Horoscope Hub',
              'profile_headshot_url' => '/images/icons/notifications/online_rules2.png',
              'action_description' => 'Your free weekly horoscope is ',
              'action_description_2' => 'now on demand',
              'request_description' => '',
              'first_image' => '/images/icons/notifications/review.svg',
              'first_text' => 'Check It Out',
              'second_image' => '',
              'second_text' => '',
              'color' => 'color_blue',
              'close'=> false,
              'updated' => $user->updated_at,
              'online' =>  0,
              ];

         return $data;
         }



         public static function f_array_to_announcement_cosmic($user,$to_whom){
         
        
          $data = [
        'user_id'=>$user->id,         
        'state' => 'online_rules',
        'action' => 'to_online_announcement_cosmic',        
        'id'=>'online_rules-'.$user->id,
        'key'=>$user->id,
        'link' =>'https://psychics1on1.com/dashboard/cosmic-rewards',
        'from' => 'Cosmic Rewards Program',
        'profile_headshot_url' => '/images/icons/notifications/cosmic_rule.png',
        'action_description' => 'Explore the Brand New Feature',
        'action_description_2' => '',
        'request_description' => 'Refer Clients, Get Rewarded',
        'first_image' => '/images/icons/notifications/show_me.svg',
        'first_text' => 'Show Me',
        'second_image' => '',
        'second_text' => '',
        'color' => 'color_blue',
        'close'=> false,
        'updated' => $user->updated_at,
        'online' =>  0,
        ];

        return $data;
        }


        public static function f_array_to_announcement_cosmic_refer($user,$to_whom){
         
        
          $data = [
        'user_id'=>$user->id,         
        'state' => 'online_rules',
        'action' => 'to_online_announcement_cosmic_refer',        
        'id'=>'online_rules-'.$user->id,
        'key'=>$user->id,
        'link' =>'https://psychics1on1.com/dashboard/cosmic-rewards',
        'from' => 'Refer & Earn More Cash',
        'profile_headshot_url' => '/images/icons/notifications/cosmic_rule.png',
        'action_description' => 'Your New Cosmic Rewards Program',
        'action_description_2' => '',
        'request_description' => 'Share your Link, Bank Bigger Paydays',
        'first_image' => '/images/icons/notifications/show_me.svg',
        'first_text' => 'Refer Now',
        'second_image' => '',
        'second_text' => '',
        'color' => 'color_blue',
        'close'=> false,
        'updated' => $user->updated_at,
        'online' =>  0,
        ];

        return $data;
        }



        public static function f_array_to_update_payout_method($user,$to_whom){
         
        
          $data = [
        'user_id'=>$user->id,         
        'state' => 'online_rules',
        'action' => 'to_online_update_payout_method',        
        'id'=>'online_rules-'.$user->id,
        'key'=>$user->id,
        'link' =>'https://psychics1on1.com/dashboard/payout',
        'from' => 'Update Your Payout Method',
        'profile_headshot_url' => '/images/icons/notifications/online_rules2.png',
        'action_description' => 'Please add your payout bank info',
        'action_description_2' => '',
        'request_description' => 'Action Necessary',
        'first_image' => '/images/icons/notifications/review.svg',
        'first_text' => 'Update Now',
        'second_image' => '',
        'second_text' => '',
        'color' => 'color_blue',
        'close'=> false,
        'updated' => $user->updated_at,
        'online' =>  0,
        ];

        return $data;
        }


        public static function f_array_to_announcement_cosmic_client($user,$to_whom){
         
        
          $data = [
        'user_id'=>$user->id,         
        'state' => 'online_rules',
        'action' => 'to_online_announcement_cosmic_client',        
        'id'=>'online_rules-'.$user->id,
        'key'=>$user->id,
        'link' =>'https://psychics1on1.com/dashboard/payment',
        'from' => 'Claim Your Referral Bonus',
        'profile_headshot_url' => '/images/icons/notifications/online_rules2.png',
        'action_description' => 'Get up to $10 bonus with first',
        'action_description_2' => 'purchase, applies at checkout!',
        'request_description' => '',
        'first_image' => '/images/icons/notifications/review.svg',
        'first_text' => 'Claim Bonus',
        'second_image' => '',
        'second_text' => '',
        'color' => 'color_blue',
        'close'=> false,
        'updated' => $user->updated_at,
        'online' =>  0,
        ];

        return $data;
        }
         

       

        public static function get_service_requested($service_id){
          $service='';
          if($service_id == 1){
              $service = 'Call';
          } 
          if($service_id == 3){
              $service = 'Video Chat';
          }  
          return $service;  
      }
      public static function convertTime($time, $fromTimezone='America/New_York', $toTimezone="America/Los_Angeles") {

       
        $date = new \DateTime($time, new \DateTimeZone($fromTimezone));
      
        $date->setTimezone(new \DateTimeZone($toTimezone));

        $_return = $date->format('Y-m-d H:i:s');

        return $_return;

      }
      public static function f_send_notification($user_1_1,$to_whom,$data_type){

        $data = NotificationsInAppUtils::f_get_array_send_notification($user_1_1,$to_whom,$data_type);
        broadcast(new NotificationsInAppEvent($data));
      }
      public static function f_get_array_send_notification($data,$to_whom,$data_type){
      $to_user ='';
      if($to_whom == 'psychic'){
        if($data_type == 'user_1_1'){
          $to_user = $data->model_id; 
        }else{
          $to_user = $data->psychic_id; 
        }
        
      }
      if($to_whom == 'user'){
        $to_user = $data->user_id;
     }    
      return  ['user_id'=>$to_user];
  
      
      }

   

  


   
   
   
}