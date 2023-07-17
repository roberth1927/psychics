<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\User;
use App\Models\PayoutLog;
use App\Services\WhiteLabel;
use App\Models\UserCreditLog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyReport extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = new Carbon();

        $total_users = User::where('role_id', WhiteLabel::roleId('User'))->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)->count();
        $total_psychics = User::where('role_id', WhiteLabel::roleId('Psychic'))->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)->count();
        $totals = [$total_users, $total_psychics ];

        for ($i = 0; $i < 7; $i++) {

            $date2 = $date->copy();
            date_sub($date2, date_interval_create_from_date_string("$i days"));
            $keyDate = $date2->format('m/d/Y');// h:i:s a. ' ( ' . $date2->tzName.' )';
    
            $data[$keyDate] = [];
    
            $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
    
            $data[$keyDate]['transactions'] = UserCreditLog::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->where('action', 'BUY_CREDIT')->count();
    
            $revenue = UserCreditLog::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->where('action', 'BUY_CREDIT')->sum('credits');
            $data[$keyDate]['revenue'] = $numberFormatter->format($revenue);
    
            $data[$keyDate]['net_revenue'] = $numberFormatter->format(((100 - WhiteLabel::config('accounting')->percent_to_payout) / 100) * $revenue);
            
            $data[$keyDate]['new_revenue'] = $data[$keyDate]['new_customer'] = $data[$keyDate]['existing_customer'] = $data[$keyDate]['aging_revenue'] = 0;
            foreach (UserCreditLog::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->where('action', 'BUY_CREDIT')->get() as $value) {
    
                if (UserCreditLog::where('created_at', '<', $date2->copy()->startOfDay())->where('action', 'BUY_CREDIT')->where('user_id', $value->user_id)->count()) {
                    $data[$keyDate]['existing_customer']++;
                    $data[$keyDate]['aging_revenue'] += $value->credits;
                } else {
                    $data[$keyDate]['new_revenue'] += $value->credits;
                    $data[$keyDate]['new_customer']++;
                }
    
            }
            $data[$keyDate]['new_revenue'] = $numberFormatter->format($data[$keyDate]['new_revenue']);
    
            $data[$keyDate]['aging_revenue'] = $numberFormatter->format($data[$keyDate]['aging_revenue']);
    
            $data[$keyDate]['refund'] = $numberFormatter->format(UserCreditLog::where('action', 'ACCOUNT_REFUND')->whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->sum('credits'));
    
            $data[$keyDate]['new_client'] = User::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->where('role_id', WhiteLabel::roleId('User'))->where('fraud', 0)->where('test_user', 0)->count();
    
            $data[$keyDate]['new_psychic'] = User::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->where('role_id', WhiteLabel::roleId('Psychic'))->where('fraud', 0)->where('test_user', 0)->count();
    
            $data[$keyDate]['psychic_transactions'] = UserCreditLog::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->whereRaw("(action = 'Chat' OR action = 'Video Chat' OR action = 'Call')")->whereNotNull('psychic_id')->groupBy('psychic_id')->count(); //PayoutLog::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->sum('payout'); //UserCreditLog::whereBetween('created_at', [$date2->copy()->startOfDay(), $date2->copy()->endOfDay()])->whereNotNull('psychic_id')->groupBy('psychic_id')->count();
        
        }

        
        return $this->markdown("emails.dailyReport")
            ->from('support@psychics1on1.com', 'Psychics1on1 Team')
            ->subject("Psychics1on1 | Today's Snapshot")
            ->with(['data' => $data, 'totals'=> $totals]);
    }
}
