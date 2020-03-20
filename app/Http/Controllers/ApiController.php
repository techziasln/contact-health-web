<?php

namespace App\Http\Controllers;

use App\Location;
use App\Patient;
use App\Status;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;


class ApiController extends Controller
{
//    Test API.
    public function full($odk_id){
        $as = Patient::all()->where('odk_id','=',$odk_id)->toArray();
        $key=array_keys($as);
        $pass = array();
        $pass[0]=$as[$key[0]];

        if(count($as))
            return response()->json([["odk_id"=>"error"]]);

        return response()->json($pass);
    }
    public function all() {
        $patients = Patient::all();
        return response()->json($patients);
    }

//    Fetch root patient and his relatives.
    public function fetch($odk_id,Request $request){


        $patients  = DB::table('patients')
            ->where('odk_id', '=', $odk_id)
            ->orWhere('reference_odk', '=', $odk_id)
            ->get();

        if (count($patients) == 0) {
            return response()->json([["odk_id"=>"error"]]);
        }
        return response()->json($patients);
    }

    public function add_members($odk_id_child,$odk_id_parent)
    {

        if (DB::table("patients")
            ->where("odk_id", "=", $odk_id_child)
            ->update(["reference_odk" => $odk_id_parent])) {
            return response()->json(["ok"]);
        } else{
            return response()->json(["error"]);
//
        }






//
    }

    public function store_location(Request $request, $odk_id) {
        $patient = Patient::all()->where('odk_id', '=', $odk_id)->count();
        if ($patient >= 1) {
            $validator = Validator::make($request->all(), [
                'lat' => 'required',
                'lng' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json('error');
            } else {
                DB::table("patients")->where('odk_id', '=', $odk_id)->update($request->all());
                $data = $request->all();
                $data['odk_id'] = $odk_id;
                Location::create($data);
                return response()->json('success');
            }
        } else {
            return response()->json('error');
        }
    }


    public function store_status(Request $request, $odk_id) {
        $patient = Patient::all()->where('odk_id', '=', $odk_id)->count();
        if ($patient >= 1) {
            $validator = Validator::make($request->all(), [
                'fever' => 'required',
                'cough' => 'required',
                'suffocation' => 'required',
                'cold' => 'required',
                'throat'=> 'required'
            ]);
            if ($validator->fails()) {
                return response()->json('error');
            } else {
                $data = $request->all();
                $data['odk_id'] = $odk_id;
                $z=Status::create($data);
                DB::table('patients')->where('odk_id', '=', $z->odk_id)->update(['last_date'=>$z->created_at]);
                return response()->json('success');
            }
        } else {
            return response()->json('error');
        }
    }
}
