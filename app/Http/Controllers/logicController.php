<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class logicController extends Controller
{
    public function login(request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ], [
            'username.required'=>"Username tidak boleh kosong",
            'password.required'=>"Password tidak boleh kosong",
        ]);

        if(auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'level'=>'admin'])){
            return redirect('/admin');
        }

        elseif(auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'level'=>'masyarakat'])){
            return redirect('masyarakat');
        }

        elseif(auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'level'=>'petugas'])){
            return redirect('petugas');
        }

        else{
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth:: logout();
        return redirect('/');
    }

    //
}
