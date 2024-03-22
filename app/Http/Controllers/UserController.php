<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
            'jogositvany_szam' => 'required|nullable|min:10|max:16',
            'telefonszam' => 'required|nullable|min:10|max:14',
            'szamlazasi_cim' => 'required|nullable'

        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'jogositvany_szam' => $validatedData['jogositvany_szam'],
            'telefonszam' => $validatedData['telefonszam'],
            'szamlazasi_cim' => $validatedData['szamlazasi_cim'],
            'role' => 0
        ]);

        return response()->json($user, 201);
    }
    public function login(Request $request)
    {
        if (!Auth()->attempt($request->only('email', 'password'))) {
            return response(['message' => 'Helytelen adatok!'], 401);
        }
        $user = User::where('email', $request->email)->first();
        $data = ["user" => $user, "token" => $user->createToken('Personal Access Token')->plainTextToken];
        return response()->json($data, 201);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'Sikeres kijelentkezés!'], 200);
    }

    public function index()
    {
        $users = User::with('rendelesek')->get();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'nullable|max:255',
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|confirmed',
            'jogositvany_szam' => 'nullable',
            'telefonszam' => 'nullable',
            'szamlazasi_cim' => 'nullable'
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json("Törölve", 204);
    }
}
