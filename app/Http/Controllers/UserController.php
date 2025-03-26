<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function returnHome()
    {
        return view('home');
    }

    public function returnUsuarios()
    {
        return view('usuarios');
    }

    public function returnBandas()
    {
        return view('bandas');
    }




    public function apagarBanda($id)
{
    DB::table('allbands')->where('id', $id)->delete();
    return back();
}







}
