<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Jobs\UserCvsTask;
use App\Exports\AllExport;
use App\Models\UserDevice;
use App\Exports\UsersExport;
use App\Services\WhiteLabel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\PayoutExport;
use App\Exports\SignUpExport;
use App\Models\UserCreditLog;
use App\Models\UserHoroscope;
use App\Exports\HoroscopeUser;
use App\Exports\PsychicExport;
use App\Http\Trails\SearchUser;
use App\Exports\MarketingExport;
use App\Exports\TransactionExport;
use App\Exports\UsersServiceExport;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;
use App\Exports\PsychicsServiceExport;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class AdminController extends Controller
{
    use SearchUser;

    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('verifield');
    }

    /**
     * @autor Alcides Rodríguez alcidesrh@gmail.com
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin', ['route' => Route::current()->parameters() ?? null]);
    }

    //change-agency
    public function agency()
    {
        return view('admin', ['route' => Route::current()->parameters() ?? null]);
    }

    /**
     * @autor Alcides Rodríguez alcidesrh@gmail.com
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsersCvs(Request $request)
    {
        if ($year = $request->get('year')) {

            $result = [];

            if ($month = $request->get('month')) {

                $date = Carbon::createFromDate($year, $month);

                $psychics = User::selectRaw('date(created_at) as date,count(id) as psychics')->where('role_id', WhiteLabel::roleId('Psychic'))->whereBetween('created_at', [$date->copy()->startOfMonth(), $date->copy()->endOfMonth()])
                    ->groupBy('date')->orderBy('date', 'DESC')->get()->toArray();

                $users = User::selectRaw('date(created_at) as date,count(id) as users')->where('role_id', WhiteLabel::roleId('User'))->whereBetween('created_at', [$date->copy()->startOfMonth(), $date->copy()->endOfMonth()])
                    ->groupBy('date')->orderBy('date', 'DESC')->get()->toArray();

                foreach (array_merge($psychics, $users) as $key => $value) {
                    if (isset($value['psychics'])) {
                        $result[$value['date']]['psychics'] = $value['psychics'];
                    } else {
                        $result[$value['date']]['users'] = $value['users'];
                    }
                    $result[$value['date']]['date'] = $value['date'];
                }

                $name = "Psychics1on1 Signups {$date->format('m')} $year.xlsx";

            } else {

                $date = Carbon::createFromDate($year);

                $psychics = User::selectRaw('date(created_at) as date,count(id) as psychics')->where('role_id', WhiteLabel::roleId('Psychic'))->whereBetween('created_at', [$date->copy()->startOfYear(), $date->copy()->endOfYear()])
                    ->groupBy('date')->orderBy('date', 'DESC')->get()->toArray();

                $users = User::selectRaw('date(created_at) as date,count(id) as users')->where('role_id', WhiteLabel::roleId('User'))->whereBetween('created_at', [$date->copy()->startOfYear(), $date->copy()->endOfYear()])
                    ->groupBy('date')->orderBy('date', 'DESC')->get()->toArray();

                foreach (array_merge($psychics, $users) as $key => $value) {
                    if (isset($value['psychics'])) {
                        $result[$value['date']]['psychics'] = $value['psychics'];
                    } else {
                        $result[$value['date']]['users'] = $value['users'];
                    }
                    $result[$value['date']]['date'] = $value['date'];
                }

                $name = "Psychics1on1 Signups $year.xlsx";
            }

            return \Maatwebsite\Excel\Facades\Excel::download(new SignUpExport($result), $name, \Maatwebsite\Excel\Excel::XLSX);
        }

        $date = new Carbon();

        if ($request->get('role') == WhiteLabel::roleId('User')) {

            $name = "Psychics1on1 Clients List {$date->format('m-d-Y')}.xlsx";

            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToBrowser($name);
            $cells = [];
            foreach ([
                'Ip',
                'Role',
                'Username',
                'ID',
                'Full name',
                'Email',
                'Phone',
                'Gender',
                'Location',
                'Sign up date',
                'Sign up time',
                'Credits',
                'Referred by',
                'Profile',
                'Active',
                'Fraud',
                'Hidden',
                'Test User'
            ]as $value) {
                $cells[] = WriterEntityFactory::createCell($value);
            }
            $singleRow = WriterEntityFactory::createRow($cells);
            $writer->addRow($singleRow);

            $users = $this->searchUsersWithFilter($request, true)->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)->get();

            foreach ($users as $value) {
                $writer->addRow(WriterEntityFactory::createRow($this->mapUserToExport($value)));
            }
                        
            $writer->close();

            // $store = (new UsersExport())->queue('fileName.xlsx', 'public');
            // return '';
            // back()->withSuccess('Export started!');
            // return ''; //\Maatwebsite\Excel\Facades\Excel::download(new UsersExport(), $name, \Maatwebsite\Excel\Excel::XLSX);
            // return \Maatwebsite\Excel\Facades\Excel::download(new UsersExport($this->searchUsersWithFilter($request, true)->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)),  $name, \Maatwebsite\Excel\Excel::XLSX);

        } else if ($request->get('role') == WhiteLabel::roleId('Psychic')) {

            $name = "Psychics1on1 Psychics List {$date->format('m-d-Y')}.xlsx";

            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToBrowser($name);
            $cells = [];
            foreach ([
                'IP',
                'Role',
                'Username',
                'ID',
                'Full name',
                'Email',
                'Phone',
                'Gender',
                'Location',
                'Specialties',
                'Sign up date',
                'Sign up time',
                'Total Net',
                'Referred by',
                'Profile',
                'Active',
                // 'Home',
                'Featured',
                'Fraud',
                'Hidden',
                'Test User',
                'Social Link #1',
                'Social Link #2'
            ]as $value) {
                $cells[] = WriterEntityFactory::createCell($value);
            }
            $singleRow = WriterEntityFactory::createRow($cells);
            $writer->addRow($singleRow);

            $users = $this->searchUsersWithFilter($request, true)->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)->get();

            foreach ($users as $value) {
                $writer->addRow(WriterEntityFactory::createRow($this->mapPsychicToExport($value)));
            }
                        
            $writer->close();
            // UserCvsTask::dispatch();
            // return 'yeee';
            // back()->withSuccess('Export started!');

            // return \Maatwebsite\Excel\Facades\Excel::download(new PsychicExport($this->searchUsersWithFilter($request, true)->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)), $name, \Maatwebsite\Excel\Excel::XLSX);

        }
        else{


        $name = "Psychics1on1 Psychics List {$date->format('m-d-y')}.xlsx";

        return \Maatwebsite\Excel\Facades\Excel::download(new AllExport($this->searchUsersWithFilter($request, true)->where('email_validated', 1)->where('fraud', 0)->where('test_user', 0)), $name, \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    public function mapPsychicToExport($user): array
    {
        $profile = $user->userProfile()->first();

        // $credit = $this->payout($user, true);

        $role = 'Psychic';

        $credit = $user->psychic_payout_logs()->sum('payout');

        $categories = "";

        foreach ($user->categories()->get() as $value) {
            $categories .= $value->name . ' ';
        }

        $phones = "";

        foreach ($user->user_mobile_nums()->get() as $value) {
            $phones .= $value->number . ' ';
        }

        if ($device = UserDevice::where('user_id', $user->id)->first()) {
            $device = $device->ip;
        }

        // $home = false;

        // if ($user->email_validated && $user->account_status == 'ACTIVE' && !$user->test_user && $user->userProfile()->where('haedshot_path', '!=', '')->count()) {
        //     $home = true;
        // }

        $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);

        try {
            $date = new Carbon($user->created_at, $profile->timezone);
        } catch (\Exception $e) {
            $date = new Carbon($user->created_at);
        }

        // $tz = null;
        // try {
        //     $tz = new CarbonTimeZone($profile->timezone);
        // } catch (\Exception $e) {
        // }

        $date->setTimezone('US/Eastern');

        return [
            WriterEntityFactory::createCell($device),
            WriterEntityFactory::createCell($role),
            WriterEntityFactory::createCell($profile->display_name),
            WriterEntityFactory::createCell($user->id),
            WriterEntityFactory::createCell($profile->name . ' ' . $profile->last_name),
            WriterEntityFactory::createCell($user->email),
            WriterEntityFactory::createCell($phones),
            WriterEntityFactory::createCell($profile->gender),
            WriterEntityFactory::createCell($profile->city . ' ' . $profile->state),
            WriterEntityFactory::createCell($categories),
            WriterEntityFactory::createCell($user->created_at ? $date->format('m/d/Y') : ''),
            WriterEntityFactory::createCell($user->created_at ? $date->format('g:i A') .'  EST' : ''),
            WriterEntityFactory::createCell($credit ? $numberFormatter->format($credit) : '$00.00'),
            WriterEntityFactory::createCell($user->referred_by),
            WriterEntityFactory::createCell($user->profile_percent . '%'),
            WriterEntityFactory::createCell($user->email_validated ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->featured ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->fraud ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->account_status == 'INACTIVE' ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->test_user ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($profile->social_link_one ?  $profile->social_link_one : ''),
            WriterEntityFactory::createCell($profile->social_link_two ?  $profile->social_link_two : '')
        ];

        return [
            $device,
            $role,
            $profile->display_name,
            $user->id,
            $profile->name . ' ' . $profile->last_name,
            $user->email,
            $phones,
            $profile->gender,
            $profile->city . ' ' . $profile->state,
            $categories,
            $user->created_at ? $date->format('m/d/Y') : '',
            $user->created_at ? $date->format('g:i A') . '  EST': '',
            $credit ? $numberFormatter->format($credit) : '$00.00',
            $user->referred_by,
            $user->profile_percent . '%',
            $user->email_validated ? 'Yes' : 'No',
            // $home ? 'Yes' : 'No',
            $user->featured ? 'Yes' : 'No',
            $user->fraud ? 'Yes' : 'No',
            $user->account_status == 'INACTIVE' ? 'Yes' : 'No',
            $user->test_user ? 'Yes' : 'No',
            $profile->social_link_one ?  $profile->social_link_one : '',
            $profile->social_link_two ?  $profile->social_link_two : ''
            
        ];
    }

    public function mapUserToExport($user): array
    {
        $profile = $user->userProfile()->first();

        $role = 'Client';

        $phones = "";

        foreach ($user->user_mobile_nums()->get() as $value) {
            $phones .= $value->number . ' ';
        }

        if ($device = UserDevice::where('user_id', $user->id)->first()) {
            $device = $device->ip;
        }

        try {
            $date = new Carbon($user->created_at, $profile->timezone);
        } catch (\Exception $e) {
            $date = new Carbon($user->created_at);
        }
        $date->setTimezone('US/Eastern');

        $numberFormatter = new \NumberFormatter( 'en_US', \NumberFormatter::CURRENCY );
        return [
            WriterEntityFactory::createCell($device),
            WriterEntityFactory::createCell($role),
            WriterEntityFactory::createCell($profile->display_name),
            WriterEntityFactory::createCell($user->id),
            WriterEntityFactory::createCell($profile->name . ' ' . $profile->last_name),
            WriterEntityFactory::createCell($user->email),
            WriterEntityFactory::createCell($phones),
            WriterEntityFactory::createCell($profile->gender),
            WriterEntityFactory::createCell($profile->city . ' ' . $profile->state),
            WriterEntityFactory::createCell($user->created_at ? $date->format('m/d/Y') : ''),
            WriterEntityFactory::createCell($user->created_at ? $date->format('g:i A') .'  EST' : ''),
            WriterEntityFactory::createCell($user->credits ? $numberFormatter->format($user->credits) : '$00.00'),
            WriterEntityFactory::createCell($user->referred_by),
            WriterEntityFactory::createCell($user->profile_percent . '%'),
            WriterEntityFactory::createCell($user->email_validated ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->fraud ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->account_status == 'INACTIVE' ? 'Yes' : 'No'),
            WriterEntityFactory::createCell($user->test_user ? 'Yes' : 'No')
        ];
    }

    /**
     * @autor Alcides Rodríguez alcidesrh@gmail.com
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHoroscopeUsersCvs(Request $request)
    {
        $query = UserHoroscope::select('user_horoscope.*', 'horoscope_zodiac_signs.name as sign');
        $query->join('horoscope_zodiac_signs', function ($query) {
            $query->whereRaw('DATE_FORMAT(user_horoscope.birth_date,"%m/%d") BETWEEN horoscope_zodiac_signs.start_period and horoscope_zodiac_signs.end_period');
        });
        // return new UserHoroscopeResourceCollection($query->get());
        $name = "Psychics1on1 Horoscope User List.xlsx";

        return \Maatwebsite\Excel\Facades\Excel::download(new HoroscopeUser($query), $name, \Maatwebsite\Excel\Excel::XLSX);
    }

    /**
     * @autor Alcides Rodríguez alcidesrh@gmail.com
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsersServiceCvs(Request $request)
    {

        $date = new Carbon();

        if ($request->get('role') == WhiteLabel::roleId('User')) {

            $name = "Psychics1on1 Clients Service List {$date->format('m-d-Y')}.xlsx";

            return \Maatwebsite\Excel\Facades\Excel::download(new UsersServiceExport($this->searchUsersWithFilter($request, true)), $name, \Maatwebsite\Excel\Excel::XLSX);

        } else if ($request->get('role') == WhiteLabel::roleId('Psychic')) {

            $name = "Psychics1on1 Psychics List {$date->format('m-d-Y')}.xlsx";

            return \Maatwebsite\Excel\Facades\Excel::download(new PsychicsServiceExport($this->searchUsersWithFilter($request, true)), $name, \Maatwebsite\Excel\Excel::XLSX);

        }
    }

    public function getPayoutCvs(Request $request)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->get('date'));

        $request->request->add(['role' => WhiteLabel::roleId('Psychic')]);

        $name = "Psychics1on1 Payout Period {$date->format('m-d-Y')}  to {$date->copy()->add(6, 'days')->format('m-d-Y')}.xlsx";

        return \Maatwebsite\Excel\Facades\Excel::download(new PayoutExport($this->searchUsersWithFilter($request), $date), $name, \Maatwebsite\Excel\Excel::XLSX);

    }

    public function getTransactionCvs(Request $request)
    {
        
        $request->request->add(['role' => WhiteLabel::roleId('User')]);

        $date = new Carbon();

        $name = $date->format('m.d.Y') . " - Psychics1on1 Transactions.xlsx";

        $credit_log = UserCreditLog::select('user_credit_log.*')->join('user', 'user.id', '=', 'user_credit_log.user_id')
            ->where('user.account_status', 'ACTIVE')->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)->where('user.role_id', 2)->where('user_credit_log.id', ">", 280000)->where('user_credit_log.id', "<=", 350000)
            ->where('user_credit_log.action', 'BUY_CREDIT')->where('user_credit_log.created_at', '>=', '2022-12-01')->orderBy('user_credit_log.created_at', 'asc');

        return \Maatwebsite\Excel\Facades\Excel::download(new TransactionExport($credit_log), $name, \Maatwebsite\Excel\Excel::XLSX);

    }

    public function getMarketingCvs(Request $request)
    {
        $name = "Psychics1on1 Marketing.xlsx";

        $date = new Carbon;

        $monthNumber = \intval($date->format('m'));

        $month = $date->copy()->startOfYear()->startOfMonth();

        $aging = $new = [];

        $setKeys = function (&$aging, &$new, $index) {
            foreach (['CUSTOMERS', 'TRANSACTIONS', 'REVENUE', 'AVE PURCHASE', 'MIN PURCHASE', 'MED PURCHASE', 'MAX PURCHASE'] as $value) {
                $aging[$index][$value] = 0;
                $new[$index][$value] = 0;
            }

        };
        
        $clid = array(
          'gclidLead' => [],
          'gclidNet' => [],
          'fbclidLead' => [],
          'fbclidNet' => [],
        );

        for ($i = 0; $i < $monthNumber; $i++) {

            $setKeys($aging, $new, $i);

            $contNew = $contAging = 0;
            // User::where('user.account_status', 'ACTIVE')->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)->where('user.role_id', WhiteLabel::roleId('User'))->get()
            foreach (
                UserCreditLog::selectRaw('SUM(user_credit_log.credits) as revenue, COUNT(user_credit_log.id) as transactions')->join('user', 'user.id', '=', 'user_credit_log.user_id')
                ->where('user.account_status', 'ACTIVE')->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)->where('user.role_id', WhiteLabel::roleId('User'))
                ->whereRaw("(user_credit_log.action = 'BUY_CREDIT')")->whereBetween('user_credit_log.created_at', [$month->copy()->startOfMonth(), $month->copy()->endOfMonth()])->groupBy('user_credit_log.user_id')->get() as $transactions) {
                // $transactions = $user->user_credit_logs()->selectRaw('SUM(user_credit_log.credits) as revenue, COUNT(user_credit_log.id) as transactions')->whereRaw("(user_credit_log.action = 'BUY_CREDIT')")->whereBetween('created_at', [$month->copy()->startOfMonth(), $month->copy()->endOfMonth()])->first();
                $revenue = $transactions->revenue;
                $count = $transactions->transactions;
                if ($count) {
                    if ($count == 1) {

                        $contNew++;

                        $new[$i]['REVENUE'] += $revenue;
                        $new[$i]['TRANSACTIONS']++;
                        $new[$i]['CUSTOMERS']++;

                        if ($new[$i]['MIN PURCHASE'] == 0) {
                            $new[$i]['MIN PURCHASE'] = $new[$i]['MAX PURCHASE'] = $new[$i]['MED PURCHASE'] = $revenue;
                        } else if ($new[$i]['MIN PURCHASE'] > $revenue) {
                            $new[$i]['MIN PURCHASE'] = $revenue;
                        } else if ($new[$i]['MAX PURCHASE'] < $revenue) {
                            $new[$i]['MAX PURCHASE'] = $revenue;
                        }

                        $medio = ($new[$i]['MIN PURCHASE'] + $new[$i]['MAX PURCHASE']) / 2;
                        if (\abs($medio - $new[$i]['MED PURCHASE']) > \abs($medio - $revenue)) {
                            $new[$i]['MED PURCHASE'] = $revenue;
                        }
                    } else {

                        $contAging++;

                        $aging[$i]['REVENUE'] += $revenue;
                        $aging[$i]['TRANSACTIONS']++;
                        $aging[$i]['CUSTOMERS']++;

                        if ($aging[$i]['MIN PURCHASE'] == 0) {
                            $aging[$i]['MIN PURCHASE'] = $aging[$i]['MAX PURCHASE'] = $aging[$i]['MED PURCHASE'] = $revenue;
                        } else if ($aging[$i]['MIN PURCHASE'] > $revenue) {
                            $aging[$i]['MIN PURCHASE'] = $revenue;
                        } else if ($aging[$i]['MAX PURCHASE'] < $revenue) {
                            $aging[$i]['MAX PURCHASE'] = $revenue;
                        }

                        $medio = ($aging[$i]['MIN PURCHASE'] + $aging[$i]['MAX PURCHASE']) / 2;
                        if (\abs($medio - $aging[$i]['MED PURCHASE']) > \abs($medio - $revenue)) {
                            $aging[$i]['MED PURCHASE'] = $revenue;
                        }
                    }
                }
            }

            $rawsql = UserCreditLog::selectRaw('SUM(user_credit_log.credits) as transactions')
              ->join('user', 'user.id', '=', 'user_credit_log.user_id')
              ->where('user.account_status', 'ACTIVE')
              ->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)->where('user.role_id', WhiteLabel::roleId('User'))
              ->whereRaw("(user_credit_log.action = 'BUY_CREDIT')")
              ->whereBetween('user_credit_log.created_at', [$month->copy()->startOfMonth(), $month->copy()->endOfMonth()])->groupBy('user_credit_log.user_id');

              $rawsql1 = UserCreditLog::selectRaw('SUM(user_credit_log.credits) as transactions')
              ->join('user', 'user.id', '=', 'user_credit_log.user_id')
              ->where('user.account_status', 'ACTIVE')
              ->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)->where('user.role_id', WhiteLabel::roleId('User'))
              ->whereRaw("(user_credit_log.action = 'BUY_CREDIT')")
              ->whereBetween('user_credit_log.created_at', [$month->copy()->startOfMonth(), $month->copy()->endOfMonth()])->groupBy('user_credit_log.user_id');
            
            $gclid = $rawsql->whereNotNull('gclid')->get();
            $gclidLead = $gclid->count();
            $gclidNet = 0;
            foreach ($gclid as $row) {
              $gclidNet += $row->transactions;
            }
            $fbclid = $rawsql1->whereNotNull('fbclid')->get();
            $fbclidLead = $fbclid->count();
            $fbclidNet = 0;
            foreach ($fbclid as $row) {
              $fbclidNet += $row->transactions;
            }

            $clid['gclidLead'][$i] = $gclidLead;
            $clid['gclidNet'][$i] = $gclidNet;
            $clid['fbclidLead'][$i] = $fbclidLead;
            $clid['fbclidNet'][$i] = $fbclidNet;

            $aging[$i]['AVE PURCHASE'] = $contAging ? \round($aging[$i]['REVENUE'] / $contAging, 2) : 0;

            $new[$i]['AVE PURCHASE'] = $contNew ? \round($new[$i]['REVENUE'] / $contNew, 2) : 0;

            $month->addMonth();
        }

        $data = [];

        foreach (['CUSTOMERS', 'TRANSACTIONS', 'REVENUE', 'AVE PURCHASE', 'MIN PURCHASE', 'MED PURCHASE', 'MAX PURCHASE'] as $value) {
            $data[$value] = [];
        }

        $getData = function ($data, $array) {
            foreach ($array as $value) {
                foreach ($value as $key => $value2) {
                    $data[$key] = \array_merge($data[$key], [$value2]);
                }
            }
            return $data;
        };
        return \Maatwebsite\Excel\Facades\Excel::download(
          new MarketingExport(
            [[
              'AGING' => $getData($data, $aging), 
              'NET NEW' => $getData($data, $new),
              'CLID' => $clid,
            ]], $date), $name, \Maatwebsite\Excel\Excel::XLSX);

    }
}
