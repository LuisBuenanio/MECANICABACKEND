<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => UserResource::collection($users)], 200);
    }

    public function show(User $user)
    {
        return response()->json(['user' => new UserResource($user)], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            // Agregar más validaciones según las necesidades
        ]);

        $user = User::create($validatedData);

        return response()->json(['user' => new UserResource($user)], 201);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Agregar más validaciones según las necesidades
        ]);

        $user->update($validatedData);

        return response()->json(['user' => new UserResource($user)], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
