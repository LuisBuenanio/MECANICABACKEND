<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json(['rooms' => RoomResource::collection($rooms)], 200);
    }

    public function show(Room $room)
    {
        return response()->json(['room' => new RoomResource($room)], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Agregar más validaciones según las necesidades
        ]);

        $room = Room::create($validatedData);

        return response()->json(['room' => new RoomResource($room)], 201);
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Agregar más validaciones según las necesidades
        ]);

        $room->update($validatedData);

        return response()->json(['room' => new RoomResource($room)], 200);
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json(null, 204);
    }
}
