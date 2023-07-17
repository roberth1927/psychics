<?php

namespace App\Http\Resources\v1;

use App\Services\PayoutUtils;
use Illuminate\Http\Resources\Json\JsonResource;

class PsychicCreditLogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       $impact = 'positive'; 
       $image ='';      
       $name = '-------';
       if($this->user){
           $name = ucfirst($this->user->userProfile->name);
           $image = $this->user->userProfile->haedshot_path;
        }
       
        if($this->action == 'Text'){
            $this->action = 'Chat';
        }
        //S_REFUND

        if(in_array($this->action,["REFUND",'ACCOUNT_REFUND', 'CHAT_REFUNDED','Adjustment by support'])){
            $impact = 'negative';
            if($this->service_id === 1){
                $this->action = "Failed Call";
            }
            elseif($this->service_id == 2){
                $this->action = "Chat Refunded";
            }
            elseif($this->service_id == 3){
                $this->action = "Failed V-Chat";
            }         
        }
        $icon = '';
         //Video Chat Calling Chat
        if($this->service_id === 1){
            $icon = 'mdi-phone';
        }
        elseif($this->service_id == 2){
            $icon = 'mdi-message';
        }
        elseif($this->service_id == 3){
            $icon = 'mdi-video';
        }
        
        if ($this->action == 'ReferralRewardEarned') {
          $icon = 'mdi-message';
        }
        return [
            'id' => $this->id,
            'client_name' => isset($this->display_name) ? $this->display_name : $name,
            'client_image' => $image,
            'service' => $this->action ?? 'Free Message',
            'duration' => $this->duration,
            'amount'=> $this->credits_commission,
            'impact' => $impact,
            'created' => $this->created_at,
            'refunded' => $this->refunded,
            'start_period' => date('Y-m-d',strtotime($this->created_at)),
            'end_period' =>  date('Y-m-d',strtotime($this->created_at)),
            'icon' =>$icon, 

           
        ];      
    }
}
