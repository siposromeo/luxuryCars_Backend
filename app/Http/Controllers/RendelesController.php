<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Naptar;
use App\Models\Rendeles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RendelesController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'berles_Kezdete' =>'required|date',
            'berles_Vege' =>'required|date',
            'megrendeles_datum' =>'required|date',
            'auto_id' =>'required|integer',
        ]);
        $car = Auto::find($validatedData['auto_id']);
        if (Rendeles::where('auto_id', $validatedData['auto_id']) -> exists()) {
            $rendeles = Rendeles::where('auto_id', $validatedData['auto_id']) -> first();
            $naptar = Naptar::find($rendeles -> naptar_id);
            if($naptar -> berles_Vege > $validatedData['berles_Kezdete']){
                return response()->json(['message' => 'Már le van foglalva ez az autó!'], 404);
            }
        }
        $naptar = Naptar::create([
            'berles_Kezdete' => $validatedData['berles_Kezdete'],
            'berles_Vege' => $validatedData['berles_Vege'],
            'auto_id' => $validatedData['auto_id'],
        ]);
        $napok = strtotime($naptar->berles_Vege) - strtotime($naptar->berles_Kezdete);
        $rendeles = Rendeles::create([
            'ar' => (date("d", $napok)-1 )* 1000,
            'megrendeles_datum' => $validatedData['megrendeles_datum'],
            'felhasznalo_id' => Auth::id(),
            'auto_id' => $validatedData['auto_id'],
            'naptar_id' => $naptar->id,
        ]);
        return response()->json($rendeles, 201);
    }
    public function index(){
        $rendeles = Rendeles::with('auto', 'user', 'naptar')->get();
        // $rendeles = Rendeles::all();
        return response()->json($rendeles);
    }
    public function show($id)
    {
        $rendeles = Rendeles::where('id', $id)->with('auto', 'user', 'naptar')->get();
        return response()->json($rendeles);
    }
    public function update(Request $request, $id)
    {
        $rendeles = Rendeles::find($id);
        $validatedData = $request->validate([
            'ar' =>'required|integer',
            'megrendeles_datum' =>'required|date',
            'auto_id' =>'required|integer',
            'naptar_id' =>'required|integer',
        ]);
        $rendeles->update($validatedData);
        return response()->json($rendeles);
    }
    public function destroy($id)
    {
        $rendeles = Rendeles::find($id);
        $rendeles->delete();
        return response()->json($rendeles);
    }
}
