<?php

namespace App\Http\Controllers;

use App\Models\Naptar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NaptarController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'berles_Kezdete' =>'required|date',
            'berles_Vege' =>'required|date',
            'berles_Idotartama' =>'required|date',
            'auto_id' =>'required|integer',
        ]);
        $naptar = Naptar::create([
            'berles_Kezdete' => $validatedData['berles_Kezdete'],
            'berles_Vege' => $validatedData['berles_Vege'],
            'berles_Idotartama' => $validatedData['berles_Idotartama'],
            'auto_id' => $validatedData['auto_id'],
        ]);
        return response()->json($naptar, 201);
    }
    public function index(){
        $naptars = Naptar::all();
        return response()->json($naptars);
    }
    public function show($id){
        $naptar = Naptar::find($id);
        return response()->json($naptar);
    }
    public function destroy($id){
        $naptar = Naptar::find($id);
        $naptar->delete();
        return response()->json($naptar);
    }
}
