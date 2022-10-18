<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                return redirect()->route('profile')->with('alert', 'Your profile info have been updated!');
            }else{
                return redirect()->route('profile')->with('alert', 'Your profile info have not been updated, passwords do not match!');
            }
        }else{
            return redirect()->route('profile')->with('alert', 'Your profile info have not been updated!');
        }

        // return redirect()->route('profile')->with('alert', 'Your profile info have been updated!');

    }
}
