<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Date;
use App\Models\User;
use App\Models\Patient;
use App\Models\medicData;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session;

class MedicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('medic.create');
        // $medic = medicData::findOrFail(auth()->user()->id);
        $medic = Db::table('medic_data')->select('*')->where('medicId',auth()->user()->id)->paginate(1);

        // return $medic;
        return view('medic.update', compact('medic'));
        // dd($medic);
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
    public function update(Request $request)
    {
        //
        // if(!empty($request->input('img'))){
        //     $name = $request->file('img')->getClientOriginalName();
        //     $request->file('img')->storeAs('/public/perfilesimg', $name); //Guardamos la imagen en el stora 

        if(DB::table('medic_data')->where('medicId', $request->input('id'))->exists()){


            $extension = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->storeAs('/public/ProfileImgs', $extension);
            $medic = medicData::updateOrCreate(
                ['medicId' => $request->input('id')],
                ['license' => $request->input('license'), 'specialty' => $request->input('specialty'), 'status' => $request->input('status'), 
                'lat' => $request->input('lat'), 'lng' => $request->input('lng'), 'description' => $request->input('description'), 
                'numbre_phone' => $request->input('numbre_phone'), 'img' => $extension, 'description' => $request->input('description')]
            );

            return Redirect::back()->with('alert', " actualizado corectamente la informacion!");
        }else{
            $medic = new medicData();

            $medic->medicId = $request->input('id');
            $medic->license = $request->input('license');
            $medic->specialty = $request->input('specialty');
            $medic->status = $request->input('status');
            $medic->lat = $request->input('lat');
            $medic->lng = $request->input('lng');
            $medic->description = $request->input('description');
            $medic->numbre_phone = $request->input('numbre_phone');
            // $medic->img = $request->input('img');
            $extension = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->storeAs('/public/ProfileImgs', $extension);

            $medic->save();


            return Redirect::back()->with('alert', "Se ha actualizado su primer registro corectamente la informacion!");
        }





            $medic = new medicData();

            $medic->medicId = $request->input('id');
            $medic->license = $request->input('license');
            $medic->specialty = $request->input('specialty');
            $medic->status = $request->input('status');
            $medic->lat = $request->input('lat');
            $medic->lng = $request->input('lng');
            $medic->description = $request->input('description');
            $medic->numbre_phone = $request->input('numbre_phone');
            // $medic->img = $request->input('img');
            $medic->img = "HOLA";

            $medic->save();


            return Redirect::back()->with('alert', "Se ha actualizado corectamente la informacion!");
    }

    public function actualizar(Request $request){
        $medic = new medicData();

            $medic->medicId = $request->input('medicId');
            $medic->license = $request->input('license');
            $medic->specialty = $request->input('specialty');
            $medic->status = $request->input('status');
            $medic->lat = $request->input('lat');
            $medic->lng = $request->input('lng');
            // $medic->description = $request->input('description');
            // $medic->numbre_phone = $request->input('numbre_phone');
            // $medic->img = $request->input('img');

            // $medic->save();

            return Redirect::back()->with('alert', "La cita ha sido actualizada con exito!");
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
}
