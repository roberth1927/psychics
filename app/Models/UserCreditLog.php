<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Aug 2019 17:18:03 +0000.
 */

namespace App\Models;

use App\Services\WhiteLabel;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

/**
 * Class UserCreditLog
 * 
 * @property int $id
 * @property int $user_id
 * @property int $model_id
 * @property int $site_id
 * @property int $credits
 * @property string $action
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserCreditLog extends Model
{

    public static function boot()
    {
        parent::boot();



        static::created(function ($model) {


            if (!$model->psychic_id) {
           
                if (($model->action == "BUY_CREDIT")&&($model->user->referred_by_user)) {
                    
                    $earn = 0; $cosmic= 0;
                    if($model->credits>=100)        { $cosmic = 100;    $earn = 250; }
                    elseif($model->credits>=75)     { $cosmic = 75;     $earn = 200; }
                    elseif($model->credits>=50)     { $cosmic = 50;     $earn = 150; }
                    elseif($model->credits>=35)     { $cosmic = 35;     $earn = 100; }
                    
                    if($cosmic)
                    DB::insert('insert into user_referral (user_id, referral_id,action,created_at,updated_at) values (?, ?,?, ?,?);', [$model->user->referred_by_user, $model->user_id, $cosmic, date('Y-m-d h:s:i'), date('Y-m-d h:s:i')]);
                    if($earn)
                    DB::update('update user SET t_cosmic = t_cosmic+'.$earn.' WHERE id = ' . $model->user->referred_by_user . ';');
                    
                }


            }

            

            if ($model->psychic_id) {

                DB::update('update user_profile A
                INNER JOIN (
                SELECT psychic_id,COUNT(distinct user_id) cou 
                FROM user_credit_log 
                where psychic_id = ' . $model->psychic_id . '
                GROUP BY user_credit_log.psychic_id) as B
                ON B.psychic_id = A.user_id 
                SET A.t_clients = B.cou
                WHERE A.user_id = ' . $model->psychic_id . ';');

                
                $commission = $model->psychic->commission;


                if(($model->action == "Chat")||($model->action == "Video Chat")||($model->action == "Call")){
                
                    $current_date = time();
                    $dateCreated = strtotime($model->user->created_at);
                    $diff = $current_date - $dateCreated;
                    $date = Carbon::parse($model->user->created_at);
                    $now = Carbon::now();
                    $diff = $date->diffInDays($now);


                    

                    $FeeFree = DB::select('select count(action) as total from user_referral 
                                        where action like "%FeeFree%" and user_id= ' . $model->psychic_id . ' and referral_id=' . $model->user_id ." group by referral_id,user_id");
                    $FeeFreeTotal =0;
                    if($FeeFree)
                    $FeeFreeTotal = $FeeFree[0]->total;

                    if (($diff <= 30) && ($model->user->referred_by_user == $model->psychic_id)) {
                        $commission = 0;
                        // if(!$FeeFree)
                        DB::insert('insert into user_referral (user_id, referral_id,action,created_at,updated_at) values (?, ?,?,?,?);', [$model->psychic_id, $model->user_id, 'FeeFree'.($FeeFreeTotal>0 ? $FeeFreeTotal : '') , date('Y-m-d h:s:i'), date('Y-m-d h:s:i')]);
                    }
              

                }
        
        
            /*DB::update('update user_credit_log 
            SET commission = "' . $commission . '", 
            credits_commission = ( credits*' . ((100 - $commission) / 100) . ')
            WHERE id = "' . $model->id . '"');*/
        
        }


            //$total_clients = $model->psychic->psychic_credit_logs::
            //$model->psychic->user_profile->t_clients = $total_clients;
        });


        static::saved(function ($model) {
          if ($model->action != 'ReferralRewardEarned') {
            if($model->psychic_id){
                $commission = $model->psychic->commission;
                DB::update('update user_credit_log 
                SET commission = "' . $commission . '", 
                credits_commission = ( credits*' . ((100 - $commission) / 100) . ')
                WHERE id = "' . $model->id . '"');     
            }
          }
            

        });
    }


    protected $table = 'user_credit_log';

    protected $casts = [
        'user_id' => 'int',
        'psychic_id' => 'int',
        'site_id' => 'int',
        'user_1_1_chat_request_id' => 'int',
        'credits' => 'decimal:2',
        'duration' => 'decimal:2',
        'refunded' => 'boolean',
    ];


    protected $fillable = [
        'user_id',
        'psychic_id',
        'credits',
        'action',
        'credits_old',
        'service_id',
        'user_1_1_chat_request_id',
        'duration',
        'promo_code',
        'promo_id'
    ];

    public function psychic()
    {
        return $this->belongsTo(\App\Models\User::class, 'psychic_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function user_1_1_chat_request()
    {
        return $this->belongsTo(\App\Models\user_1_1_chat_request::class, 'user_1_1_chat_request_id');
    }

    public static function dollars_to_credits($dollars, $date = '0000-00-00 00:00:00')
    {
        if ($date > '0000-00-00 00:00:00') {
            return $dollars / self::credit_to_dollar_on_date($date);
        }
        return $dollars / WhiteLabel::config('accounting')->credit_to_dollar;
    }

    public static function credit_to_dollar_on_date($date)
    {
        $credit_to_dollar = WhiteLabel::config('accounting')->credit_to_dollar;
        foreach (WhiteLabel::config('accounting')->credit_to_dollar_history as $credit_to_dollar_array) {
            if ($date > $credit_to_dollar_array['begin_date']) {
                $credit_to_dollar = $credit_to_dollar_array['credit_to_dollar'];
            }
        }
        return $credit_to_dollar;
    }
}
