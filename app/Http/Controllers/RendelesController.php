<?php

namespace App\Http\Controllers;

use App\Models\Rendeles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RendelesController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ar' =>'required|integer',
            'megrendeles_datum' =>'required|date',
            'auto_id' =>'required|integer',
            'naptar_id' =>'required|integer',
        ]);
        $rendeles = Rendeles::create([
            'ar' => $validatedData['ar'],
            'megrendeles_datum' => $validatedData['megrendeles_datum'],
            'auto_id' => $validatedData['auto_id'],
            'naptar_id' => $validatedData['naptar_id'],
        ]);
        return response()->json($rendeles, 201);
    }
    public function index(){
        $rendeles = Rendeles::all();
        return response()->json($rendeles);
    }
    public function show($id)
    {
        $rendeles = Rendeles::find($id);
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
