<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function update ( Request $request){

        // if($request->input('name')){
        //     auth()->user()->update($request->only('name', 'email'));
        // }else{
        //     return print_r($request->input('name'));
        // }

        if($request->input('name') or $request->input('password')){
            if($request->input('password') == $request->input('password_confirmation')){
                auth()->user()->update([
                    'password' => bcrypt($request->input('password'))
                ]);
                auth()->user()->update($request->only('name', 'email'));
                return redirect()->route('profile')->with('alert', 'Tu perfil ha sido actualizado!');
            }else{
                return redirect()->route('profile')->with('alert', 'Opps Tu perfil no ha sido actualizado, passwords no coinciden!');
            }
        }else{
            return redirect()->route('profile')->with('alert', 'Opps error tu informacion no se ha actualizado!');
        }

        // return redirect()->route('profile')->with('alert', 'Your profile info have been updated!');

    }

    public function create (){
        return view('adminviews.create');
    }

    public function store( Request $request){
        if($request->input('password') == $request->input('password_confirmation')){
            $user = New User();

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->password);
            $user->rol = $request->input('rol');

            $user->save();

            return Redirect::back()->with('alert', "El usuario ya ha sido creado :D!");

        }else{
            return Redirect::back()->with('alert', "Opps el usuario no ha sido actualizado, passwords no coinciden!");
        }

    }

    public function index(){
        $users = User::all();
        return view('adminviews.index', compact('users'));
    }

}
