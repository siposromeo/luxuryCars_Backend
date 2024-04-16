<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AutoController extends Controller
{
    public function store(Request $request){
        $auto = new Auto();
        $auto->marka_modelnev = $request->marka_modelnev;
        $auto->ferohely = $request->ferohely;
        $auto->loero = $request->loero;
        $auto->kep_Url = $request->kep_Url;
        $auto->leiras = $request->leiras;
        $auto->save();
        return response()->json($auto);
    }
    public function index(){
        $autos = Auto::all();
        return response()->json($autos);
    }
    public function show($id)
    {
        $auto = Auto::find($id);
        return response()->json($auto);
    }
    public function pagination()
    {
        $cars = Auto::where('id',">",0)->paginate(10);
        return response()->json($cars);
    }
}
