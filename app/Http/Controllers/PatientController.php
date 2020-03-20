<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class PatientController extends Controller
{
    public function add(Request $data)
    {

        $request = request()->validate([
            'odk_id' => ['required', Rule::unique('patients', 'odk_id')],
            'name' => 'required',
            'phone' => 'required',
            'lng' => '',
            'lat' => '',
            'addinfo' => '',
            'addby' => '',
        ]);
        if ($data->photo != NULL)
            $request['photo'] = $data->file("photo")->store('public/photo_employees');
        $request['addby'] = auth()->id();
        while (true) {
            $otp = rand(1000, 9999);
            $p = Patient::all()->where('otp', '=', $otp)->count();
            if ($p == 0) {
                $request['otp'] = $otp;
                break;
            }
        }
        $p = Patient::create($request);

        $client = new \GuzzleHttp\Client();
        $message = "Contact Health ആപ്പിലേക്ക് ലോഗിൻ ചെയ്യാനുള്ള‌ ".$p->name." ന്റെ വിവരങ്ങൾ:\\nOTP: ".$otp."\\nODK: ".$p->odk_id;
        $body = '{

        "sender": "HEALTH",
  "route": "4",
  "country": "91",
  "unicode": 1,
  "sms": [
    {

      "message": "'.$message.'",
      "to": [
          "'.$p->phone.'"
      ]
    }
  ]
}';

//        $r = $client->request('POST', 'https://api.msg91.com/api/v2/sendsms', [
//            'body' => $body,
//            'headers'=> [
//                'authkey'=> '186190At18BdWrkLG5e70e49eP1',
//                'Content-Type'=> 'application/json'
//            ]
//        ]);

        return back()->with("MSG", "Record added successfully")->with("TYPE", "Success");
    }

    public function updatepatient(request $data, $id)
    {
        $request = request()->validate([
            'odk_id' => ['required'],
            'name' => 'required',
            'phone' => 'required',
            'addinfo' => '',
            'addby' => '',

        ]);
        if ($data->photo != NULL) {
            Storage::delete(Patient::find($id)->photo);
            $request['photo'] = $data->file("photo")->store('public/photo_employee');
        }
        Patient::whereId($id)->update($request);
        return back()->with("MSG", "Patient Updated Successfully.")->with("TYPE", "Success");


    }

    public function delete(Request $request)
    {
        if (Storage::delete(Patient::find($request->id)->photo) || $request->photo == NULL)
            Patient::destroy($request->id);
        return redirect()->route('all_patient');

    }
}
