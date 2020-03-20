<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Patient;
use App\Expense;
use App\income;
use App\Status;
use App\User;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Session;

class AdminController extends Controller
{
    protected $change_pass;

    public function __construct()
    {

        $this->middleware('auth');


    }

    public function home()
    {

        $head_name = "Dashboard";
        return view('admin.index', compact("head_name"));
    }

    public function addsuper()
    {
        $head_name = "Super User";
        return view("admin.super_user.add_super_user", compact("head_name"));
    }

    public function allsuper()
    {
        $users = User::all();
        $head_name = "Super User";
        return view("admin.super_user.all_super_user", compact("head_name"), compact('users'));
    }

    public function updatesuper(User $id)
    {
        $head_name = "Update User";
        return view("admin.super_user.update_super_user", compact("head_name"), compact('id'));
    }

    public function addpatient()
    {
        $head_name = "Contact";
        return view("admin.patient.add_patient", compact("head_name"));
    }

    public function allpatient()
    {
        $head_name = "Contact";
        $data = Patient::all()->sortByDesc('id');

        return view("admin.patient.all_patient", compact("head_name"), compact("data"));
    }

    public function viewpatient(Patient $id)
    {

        $head_name = "Contact";

        return view("admin.patient.view_patient", compact("head_name"), compact('id'));
    }

    public function updatepatient(Patient $id)
    {

        $head_name = "Update Contact";

        return view("admin.patient.update_patient", compact("head_name"), compact('id'));
    }

    public function allstatus()
    {

        $head_name = "Status";
        $data = Patient::all()->sortByDesc('id');
        $statuses = DB::table('statuses')->orderBy('created_at', 'desc')->get();
        foreach ($data as $d) {

            $s = DB::table('statuses')->where('odk_id', '=', $d->odk_id)->orderBy('created_at', 'desc')->first();
            if (!$s) {
                continue;
            }
            $r = 0;
            if ($s->fever)
                $r += 2;
            if ($s->cough)
                $r += 2;
            if ($s->suffocation)
                $r += 2;
            if ($s->cold)
                $r += 1;
            if ($s->throat)
                $r += 1;

            if ($r >= 6) {
                $d->risk_level = 3;
                $d->save();
            } else if ($r >= 4) {
                $d->risk_level = 2;
                $d->save();
            } else if ($r >= 1 && $r <= 3) {
                $d->risk_level = 1;
                $d->save();
            } else {
                $d->risk_level = 0;
                $d->save();
            }
        }
        return view("admin.status.all_status", compact("head_name"), compact("data", "statuses"));
    }

    public function viewstatus($id)
    {
        $head_name = "Status";
        $p = Patient::all()->where('odk_id', '=', $id)->first();
        $i = Status::all()->where('odk_id', '=', $id);
//        return $i;
        foreach ($i as $d) {
            $r = 0;
            if ($d->fever)
                $r += 2;
            if ($d->cough)
                $r += 2;
            if ($d->suffocation)
                $r += 2;
            if ($d->cold)
                $r += 1;
            if ($d->throat)
                $r += 1;

            if ($r >= 6 || ($d->fever && $d->cough && $d->suffocation)) {
                $d->risk_level = 3;
                $d->save();
            } else if ($r >= 4 || ($d->fever && $d->cough) || ($d->cough && $d->suffocation) || ($d->fever && $d->suffocation)) {
                $d->risk_level = 2;
                $d->save();
            } else if ($r >= 1 && $r <= 3) {
                $d->risk_level = 1;
                $d->save();
            } else {
                $d->risk_level = 0;
                $d->save();
            }

        }

        return view("admin.status.view_status", compact("head_name"), compact('i', 'p'));

    }

    public function graph()
    {
        //return Patient::select("odk_id","lat","lng")->get();
       // $head_name="Map";
        $loc=array();
        $locs=Patient::select("odk_id","lat","lng","name","phone")->get();

        foreach ($locs as $l)
        {
            $lo=array();

            $lo[]=$l->lat;
            $lo[]=$l->lng;
            $lo[] = strval("ODK ID:".($l->odk_id)." / "."Name:".ucfirst($l->name)." / "."Phone:".$l->phone);
            $loc[]=$lo;
        }


        $loc=json_encode($loc);
        //$name=Patient::all()->where("odk_id","=",$id);

       // return $loc;














        $allcount = Patient::all()->count();
        // return date("Y-m-d",strtotime(Carbon::today()));

        $count = Patient::whereDate("last_date", Carbon::today())->count();
//        return Patient::wher('last_date',"=" ,Carbon::today())->count();

        $nocount = $allcount - $count;


        // Symptoms Stats

       // return Status::whereDate("created_at", Carbon::today())->get();

        $feverCount = Status::whereDate("created_at", Carbon::today())->where('fever', '=', 1)->count();
        $coughCount = Status::whereDate("created_at", Carbon::today())->where('cough', '=', 1)->count();
        $suffocationCount = Status::whereDate("created_at", Carbon::today())->where('suffocation', '=', 1)->count();
        $coldCount = Status::whereDate("created_at", Carbon::today())->where('cold', '=', 1)->count();
        $throatCount = Status::whereDate("created_at", Carbon::today())->where('throat', '=', 1)->count();



        $head_name = 'Graph';
        return view("admin.reports.graph", compact("head_name", "count",
            "nocount", 'feverCount', 'coughCount', 'suffocationCount', 'coldCount', 'throatCount','loc'));
    }

}
//        if(Auth::user()->change_pass){
//            \Illuminate\Support\Facades\Session::put('page_msg',['msg'=>'Please change your account password !!',
//                'type'=>'danger','button'=>'name','button_name'=>'change password','url'=>'http://'.request()->getHost().':'.request()->getPort().'/password/reset/'.'?email=' .\auth()->user()->email]);
//
//        }else{
//            \Illuminate\Support\Facades\Session::forget('page_msg');
//        }
