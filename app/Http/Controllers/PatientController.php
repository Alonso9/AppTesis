<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Date;
use App\Models\User;
use App\Models\Patient;
use App\Models\Records;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = DB::table('patients')->select('*')
        ->where('idMedic','=', auth()->user()->id)
        ->orderBy('patientname', 'asc')
        ->paginate(50);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = DB::table('patients')->find($id);
        $appointments = DB::table('appointment')->select('*')
        ->where('patientname','=', $patient->patientname)
        ->orderBy('date', 'asc')
        ->paginate(50);
        // $paciente = DB::table('patients')->select('*')->where('id', $id);
        
        return view('patients.records', compact('patient', 'appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRecords ($id){

        $patient = Patient::findOrFail($id);
        // $patient = Patient::query()->findOrFail($id);
        // $patient = DB::table('patients')->find($id);
        $record = DB::table('records')->select('*')->where('patientId', $id)->first();

        return view('patients.historial', compact('patient', 'record'));
        // return $record;
    }

    public function createRecords($id){
        $patient = Patient::findOrFail($id);
        return view('patients.create', compact('patient'));
    }

    public function saveRecords(Request $request){
        $record = new Records();
        
        $record->patientId = $request->input('id');
        $record->ethnicity = $request->input('ethnicity');
        $record->dob = $request->input('dob');
        $record->surgeries = $request->input('surgeries');
        $record->sex = $request->input('sex');
        $record->familybackgr = $request->input('familybackgr');
        $record->diabetes = $request->input('diabetes');
        $record->numbre_phone = $request->input('numbre_phone');
        $record->broken_bones = $request->input('broken_bones');
        $record->blood_type = $request->input('blood_type');

        $record->save();

        $patients = DB::table('patients')->select('*')
        ->where('idMedic','=', auth()->user()->id)
        ->orderBy('patientname', 'asc')
        ->paginate(50);
        

        // return "se mando";
        return view('patients.index', compact('patients'))->with('alert', "La cita ha sido actualizada con exito!");
    }

}
