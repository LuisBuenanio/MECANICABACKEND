<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message1;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message1::all();
        return response()->json(['messages' => MessageResource::collection($messages)], 200);
    }

    public function show(Message1 $message)
    {
        return response()->json(['message' => new MessageResource($message)], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $message = Message1::create($validatedData);

        return response()->json(['message' => new MessageResource($message)], 201);
    }

    public function update(Request $request, Message1 $message)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $message->update($validatedData);

        return response()->json(['message' => new MessageResource($message)], 200);
    }

    public function destroy(Message1 $message)
    {
        $message->delete();

        return response()->json(null, 204);
    }
}
