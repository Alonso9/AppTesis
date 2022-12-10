<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Models\User;
use App\Models\Patient;
use App\Models\appointmentdata;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('America/Mexico_City');
        // return redirect()->route('appointments.index');
        $appointments = DB::table('appointment')->select('*')
        ->where('idMedic','=', auth()->user()->id)
        ->where('date','=', date("y-m-d"))
        ->orderBy('hour', 'asc')
        ->paginate(50);
        return view('appointments.index', compact('appointments'));
        // dd($appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // seccion('id');
    public function create()
    {
        //
        $patients = DB::table('patients')->select('*')
        ->where('idMedic','=', auth()->user()->id)
        ->orderBy('id', 'asc')
        ->paginate(50);

        $appointments = DB::table('appointment')->select('date', 'hour')->where('idMedic', auth()->user()->id);
        return view('appointments.create', compact('patients', 'appointments'));
        // dd($appointments);
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
        $appointment = new Appointment();
        $patient = new Patient();
        $hour =  $request->input('hour');
        if(DB::table('appointment')->where('hour', $request->input('hour'))->exists() && DB::table('appointment')->where('date', $request->input('date'))->exists()){
            $mesg = "Ya tienes una cita esa hora: "."$hour".", le recomiendo que cambie la hora!";
            return back()->with('alert', $mesg);
        }else{
            if(DB::table('appointment')->where('patientname', $request->input('patientname'))->exists()){
            
                $appointment->hour = $hour;
                $appointment->idMedic = $request->input('medicId');
                $appointment->date = $request->input('date');
                $appointment->patientname = $request->input('patientname');
                $appointment->socialNumber = $request->input('socialNumber');
                $appointment->status = $request->input('status');

                $appointment->save();
                $mesg = "Se aguardo la cita medica correctamente :D";
            
            }else{
                // $appointment->hour = $request->input('hour');
                $appointment->hour = $hour;
                $appointment->idMedic = $request->input('medicId');
                $appointment->date = $request->input('date');
                $appointment->patientname = $request->input('patientname');
                $appointment->socialNumber = $request->input('socialNumber');
                $appointment->status = $request->input('status');
                
                /* Save patient info */
                $appointment->save();
    
                
                DB::insert('insert into patients (patientname, idMedic, socialNumber) values (?, ?, ?)', [$request->input('patientname'), $request->input('medicId'), $appointment->socialNumber = $request->input('socialNumber')]);
                $mesg = "Se guardo la cita y el paciente nuevo quedo registrado";
            }
        }
                
        date_default_timezone_set('America/Mexico_City');
        $appointments = DB::table('appointment')->select('*')
        ->where('idMedic','=', auth()->user()->id)
        ->where('date','=', date("y-m-d"))
        ->orderBy('hour', 'asc')
        ->paginate(50);
        // return view('appointments.index', compact('appointments'))->with(['msg' => $mesg]);
        return redirect()->route('appointments.index', compact('appointments'))->with('alert', $mesg);
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
        $appointment = Appointment::findOrFail($id);

        return view('appointments.details', compact('appointment'));
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
        $appointment = Appointment::findOrFail($id);

        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $appointment = Appointment::findOrFail($request->input('id'));
        $appointment->hour = $request->input('hour');
        $appointment->date = $request->input('date');
        $appointment->patientname = $request->input('patientname');
        $appointment->save();

        return Redirect::back()->with('alert', "La cita ha sido actualizada con exito!");
        // return redirect()->route('appointments.index', compact('appointments'))->with('alert', $mesg);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        
        // $appointment = Appointment::find($request->input('idMedic'));
        $search = trim($request->get('search'));
        $appointments = DB::table('appointment')->select('*')->where('date',$search)->where('idMedic', $request->input('idMedic'))->orderBy('date')->paginate(50);
        
        return view('appointments.index', compact('appointments'));
        // return $request->input('idMedic');
        // return dd($appointments);
        // return $search;

    }

    public function makeappoinment($id){
        $appointment = Appointment::findOrFail($id);

        return view('appointments.make', compact('appointment'));
    }

    public function fullappointment(Request $request){

        $appointment = Appointment::findOrFail($request->input('id'));
        $appointment->status = $request->input('status');
        $appointment->save();

        $data = DB::insert('insert into appointmentdata (matter, description, blood_pressure, weight, height, medicine, finaldescription, idAppointment) values (?,?,?,?,?,?,?,?)', [$request->input('matter'), $request->input('description'), $request->input('blood_pressure'), $request->input('weight'), $request->input('height'), $request->input('medicine'), $request->input('finaldescription'), $request->input('id')]);

        return view('appointments.message', compact('appointment'));

    }

    public function pdfGenerator(Request $request){
        $pdf = PDF::loadview('appointments.download');
        

        return $pdf->download('recetamedica');
    }

}
