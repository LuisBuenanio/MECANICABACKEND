<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupChat;
use Illuminate\Support\Facades\Auth;


class GroupChatController extends Controller
{
    public function index()
    {
        $groups = GroupChat::all();
        return view('group-chats.index', compact('groups'));
    }
    public function addMemberForm(GroupChat $groupChat)
    {
        // Verificar si el usuario actual es el administrador del grupo
        if ($groupChat->created_by != Auth::id()) {
            return redirect()->route('group-chats.show', $groupChat)
                ->with('error', 'Solo el administrador puede agregar miembros al grupo.');
        }

        // Obtener todos los usuarios excepto el administrador actual y los miembros actuales del grupo
        $users = User::whereNotIn('id', [$groupChat->created_by])
            ->whereDoesntHave('groupChats', function ($query) use ($groupChat) {
                $query->where('group_chat_id', $groupChat->id);
            })
            ->get();

        return view('group-chats.add_member_form', compact('groupChat', 'users'));
    }
    public function addMember(Request $request, GroupChat $groupChat)
    {
        // Verificar si el usuario actual es el administrador del grupo
        if ($groupChat->created_by != Auth::id()) {
            return redirect()->route('group-chats.show', $groupChat)
                ->with('error', 'Solo el administrador puede agregar miembros al grupo.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Agregar al usuario seleccionado como miembro del grupo
        $groupChat->members()->attach($request->user_id);

        return redirect()->route('group-chats.show', $groupChat)
            ->with('success', 'Usuario agregado exitosamente al grupo.');
    }

    public function showGroupsTab()
    {
        $groups = GroupChat::all();  // Obtén todos los grupos (ajusta según tus necesidades)

        return view('Chatify::groups-tab', compact('groups'));
    }

    public function show($id)
    {
        $group = GroupChat::findOrFail($id);
        return view('group-chats.show', compact('group'));
    }

    public function create()
    {
        return view('group-chats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'is_public' => 'boolean',
            'invitation_link' => 'nullable|url',
        ]);

        $group = GroupChat::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        // Asociar al creador del grupo como miembro
        $group->members()->attach(Auth::id(), ['is_admin' => true]);


        return redirect()->route('group-chats.index')->with('success', 'Grupo creado exitosamente.');
        
    }

    public function edit($id)
    {
        $group = GroupChat::findOrFail($id);
        return view('group-chats.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = GroupChat::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Agrega otras validaciones según tus requisitos
        ]);

        $group->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            // Agrega otros campos según tus requisitos
        ]);

        return redirect()->route('group-chats.show', $group->id)
                         ->with('success', 'Grupo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $group = GroupChat::findOrFail($id);
        $group->delete();

        return redirect()->route('group-chats.index')
                         ->with('success', 'Grupo eliminado exitosamente');
    }
}
