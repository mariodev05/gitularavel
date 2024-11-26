<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $user = User::where('usuario', $request->input('usuario'))
                    ->where('pass', $request->input('pass'))
                    ->first();
        if ($user) {
            return response()->json($user, 200);
        }
        return response()->json(['message' => 'Login failed'], 401);
    }
}
