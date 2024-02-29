<!-- resources/views/group_chats/add_member_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div>
        <h2>Agregar miembro al grupo {{ $groupChat->name }}</h2>

        <form method="POST" action="{{ route('group_chats.add_member', $groupChat) }}">
            @csrf
            <label for="user_id">Seleccionar usuario:</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit">Agregar Miembro</button>
        </form>
    </div>
@endsection
