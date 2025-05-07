<?php

namespace App\Http\Controllers;

use Chatify\Http\Controllers\MessagesController as BaseMessagesController;
use Illuminate\Http\Request;
use App\Models\GroupChat;
use Illuminate\Support\Facades\Auth;


class GroupChatController extends BaseMessagesController
{
    public function showGroup($groupId)
    {
        // Obtener detalles del grupo
        $group = Group::findOrFail($groupId);

        // Obtener mensajes del grupo
        $messages = $this->fetchGroupMessages($groupId);

        // Obtener miembros del grupo
        $members = $this->getGroupMembers($groupId);

        return view('group_chat.show', compact('group', 'messages', 'members'));
    }

    public function sendGroupMessage(Request $request, $groupId)
    {
        // Validar la solicitud
        $request->validate([
            'message' => 'required|string',
        ]);

        // Enviar el mensaje al grupo
        $this->sendMessage($request->message, 'group', $groupId);

        // Redireccionar o responder según sea necesario
        return redirect()->route('group.show', $groupId);
    }

    public function addGroupMember($userId, $groupId)
    {
        // Verificar si el usuario ya es miembro del grupo
        if (!$this->isGroupMember($userId, $groupId)) {
            // Agregar al usuario como miembro del grupo
            GroupMember::create([
                'user_id' => $userId,
                'group_id' => $groupId,
            ]);
        }

        // Redireccionar o responder según sea necesario
        return redirect()->route('group.show', $groupId);
    }

    public function removeGroupMember($userId, $groupId)
    {
        // Eliminar al usuario como miembro del grupo
        GroupMember::where('user_id', $userId)->where('group_id', $groupId)->delete();

        // Redireccionar o responder según sea necesario
        return redirect()->route('group.show', $groupId);
    }

    public function getGroupMembers($groupId)
    {
        // Obtener la lista de miembros del grupo
        $members = GroupMember::where('group_id', $groupId)->get();

        // Obtener detalles de los usuarios
        $users = User::whereIn('id', $members->pluck('user_id'))->get();

        return view('group_chat.members', compact('users'));
    }

    public function deleteGroup($groupId)
    {
        // Eliminar el grupo y sus mensajes
        Group::where('id', $groupId)->delete();
        $this->deleteConversation($groupId, 'group');

        // Redireccionar o responder según sea necesario
        return redirect()->route('dashboard')->with('success', 'Group deleted successfully.');
    }

    // Métodos adicionales según sea necesario

    // ...

    // Lógica para obtener los mensajes del grupo
    protected function fetchGroupMessages($groupId)
    {
        // Implementa tu lógica para obtener los mensajes del grupo
        // Puedes utilizar la función fetchMessagesQuery del controlador base
    }

    // Lógica para verificar si un usuario es miembro del grupo
    protected function isGroupMember($userId, $groupId)
    {
        return GroupMember::where('user_id', $userId)->where('group_id', $groupId)->exists();
    }
    
}
