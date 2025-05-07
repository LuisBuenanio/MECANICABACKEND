<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Events\MessageRead;
use App\Events\UserTyping;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request, $chatroomId)
    {
        $request->validate([
            'content' => 'nullable|string',
            'file' => 'nullable|file',
        ]);

        $filePath = $request->file('file') ? $request->file('file')->store('messages') : null;

        $message = Message::create([
            'chatroom_id' => $chatroomId,
            'user_id' => auth()->id(),
            'content' => $request->content,
            'file_path' => $filePath,
        ]);

        return response()->json(['message' => $message], 201);
    }

    public function typing(Request $request, $chatroomId)
    {
        broadcast(new UserTyping($chatroomId, auth()->id()))->toOthers();
        return response()->json(['status' => 'User typing event broadcasted'], 200);
    }

    public function markAsRead(Request $request, $chatroomId)
    {
        $request->validate(['message_ids' => 'required|array']);

        Message::whereIn('id', $request->message_ids)
            ->where('chatroom_id', $chatroomId)
            ->update(['read_at' => now()]);

        broadcast(new MessageRead($chatroomId, $request->message_ids))->toOthers();

        return response()->json(['status' => 'Messages marked as read'], 200);
    }

    public function unreadMessages($chatroomId)
    {
        $unreadMessages = Message::where('chatroom_id', $chatroomId)
            ->whereNull('read_at')
            ->where('user_id', '!=', auth()->id())
            ->count();

        return response()->json(['unread_messages' => $unreadMessages]);
    }
}
