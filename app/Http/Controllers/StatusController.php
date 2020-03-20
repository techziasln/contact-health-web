<?php

namespace App\Http\Controllers;

use App\Location;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function map($id)
    {
        $head_name="Map";
        $loc=array();
        $locs=DB::table('locations')->where('odk_id','=',$id)->get();

        foreach ($locs as $l)
        {
            $lo=array();

            $lo[]=$l->lat;
            $lo[]=$l->lng;
            $lo[] = date('d-m-Y', strtotime($l->created_at))." ".date('h:m A', strtotime($l->created_at));
            $loc[]=$lo;
        }
        $loc=json_encode($loc);
        $name=Patient::all()->where("odk_id","=",$id);

        return view('admin.updates.home',compact('loc'),compact('head_name','name'));

    }

}
