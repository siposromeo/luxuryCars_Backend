<?php

namespace App\Http\Controllers;

use App\Models\Naptar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NaptarController extends Controller
{
    public function store(Request $request)
    {
        
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
