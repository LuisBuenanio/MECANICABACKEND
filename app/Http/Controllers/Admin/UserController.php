<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.users.index')->only('index');
        $this-> middleware('can:admin.users.create')->only('create', 'store');
        $this-> middleware('can:admin.users.edit')->only('edit', 'update');
        $this-> middleware('can:admin.users.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.users.index');
    }


    public function create()
    {
        /* $roles = Role::all(); */
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create', compact('roles'));
    }

    

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('admin.users.index')-> with('info', 'Médico Creado correctamente');;
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    

    public function edit(User $user)
    {
        
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }
    

    public function update(Request $request, User $user)
    {
        // Validar los datos del formulario
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        // Actualizar los datos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        //Permite cambiar la contraseña 
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        // Asignar roles y permisos al usuario
        $user->syncRoles($request->input('roles', []));
        $user->syncPermissions($request->input('permissions', []));

        // Redirigir al usuario a la página de edición de usuarios
        return redirect()->route('admin.users.index')->with('info', 'El médico ha sido actualizado correctamente.');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')-> with('eliminar', 'ok');

    }
}
