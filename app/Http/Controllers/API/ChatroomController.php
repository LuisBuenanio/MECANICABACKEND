<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Chatroom;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    // Crear o obtener una sala de chat existente
    public function createOrGetChatroom(Request $request)
    {
        $user = $request->user();
        
        // Lógica para crear o recuperar una sala
        $chatroom = Chatroom::firstOrCreate([
            'user_id' => $user->id,
            'name' => $request->name,
        ]);

        return response()->json($chatroom);
    }

    // Obtener los mensajes de una sala
    public function getMessages($chatroomId)
    {
        $chatroom = Chatroom::findOrFail($chatroomId);
        $messages = $chatroom->messages()->with('user')->get();

        return response()->json($messages);
    }

    // Enviar un mensaje en una sala
    public function sendMessage(Request $request, $chatroomId)
    {
        $chatroom = Chatroom::findOrFail($chatroomId);
        $message = $chatroom->messages()->create([
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        broadcast(new \App\Events\MessageSent($message)); // Enviar el evento para notificación en tiempo real
        return response()->json($message, 201);
    }
}
