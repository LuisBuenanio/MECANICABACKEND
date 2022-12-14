<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Personal Administrativo']);
        $role3 = Role::create(['name' => 'Docente']);
        $role4 = Role::create(['name' => 'Estudiante']);
        $role5 = Role::create(['name' => 'Invitado']);

        Permission::create(['name' => 'admin.home','description' => 'Ver el Dashboard'])->syncRoles([$role1, $role2, $role3]);


        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de Usarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Asignar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.roles.index','description' => 'Ver listado de Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.create','description' => 'Crear Rol'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.edit','description' => 'Editar Rol'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.destroy','description' => 'Eliminar Rol'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.noticias.index','description' => 'Ver listado de Noticias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.noticias.create','description' => 'Crear Noticias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.noticias.edit','description' => 'Editar Noticias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.noticias.destroy','description' => 'Eliminar Noticias'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.escuela.index','description' => 'Ver Datos Escuela'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.escuela.edit','description' => 'Editar Datos Escuela'])->syncRoles([$role1, $role2]);
          
        Permission::create(['name' => 'admin.integrantes.index','description' => 'Ver listado de Integrantes de Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.integrantes.create','description' => 'Crear Integrantes de Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.integrantes.edit','description' => 'Editar Integrantes de Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.integrantes.destroy','description' => 'Eliminar Integrantes de Asociaci??n'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.tipointegrantes.index','description' => 'Ver listado de Tipo de Integrante Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipointegrantes.create','description' => 'Crear Tipo de Integrante Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipointegrantes.edit','description' => 'Editar Tipo de Integrante Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipointegrantes.destroy','description' => 'Eliminar Tipo de Integrante Asociaci??n'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.asociacion.index','description' => 'Ver Datos Asociaci??n'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.asociacion.edit','description' => 'Editar Datos Asociaci??n'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.tipoautoridad.index','description' => 'Ver listado de Tipo de Autoridad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoautoridad.create','description' => 'Crear Tipo de Autoridad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoautoridad.edit','description' => 'Editar Tipo de Autoridad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoautoridad.destroy','description' => 'Eliminar Tipo de Autoridad'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.autoridades.index','description' => 'Ver listado de Autoridades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.autoridades.create','description' => 'Crear Autoridades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.autoridades.edit','description' => 'Editar Autoridades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.autoridades.destroy','description' => 'Eliminar Autoridades'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.galerias.index','description' => 'Ver listado de Galer??as'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.galerias.create','description' => 'Crear Galer??as'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.galerias.edit','description' => 'Editar Galer??as'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.galerias.destroy','description' => 'Eliminar Galer??as'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.multimedias.index','description' => 'Ver listado de Im??genes de Galer??a'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.multimedias.create','description' => 'Crear Noticias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.multimedias.edit','description' => 'Editar Noticias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.multimedias.destroy','description' => 'Eliminar Noticias'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.tipoconvenio.index','description' => 'Ver listado Tipo de Convenio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoconvenio.create','description' => 'Crear Tipo de Convenio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoconvenio.edit','description' => 'Editar Tipo de Convenio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoconvenio.destroy','description' => 'Eliminar Tipo de Convenio'])->syncRoles([$role1, $role2]);
    
    
        Permission::create(['name' => 'admin.convenio.index','description' => 'Ver listado de Convenios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.convenio.create','description' => 'Crear Convenios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.convenio.edit','description' => 'Editar Convenios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.convenio.destroy','description' => 'Eliminar Convenios'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.tipoproyecto.index','description' => 'Ver listado de Tipo de Proyecto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoproyecto.create','description' => 'Crear Tipo de Proyecto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoproyecto.edit','description' => 'Editar Tipo de Proyecto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoproyecto.destroy','description' => 'Eliminar Tipo de Proyecto'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.proyecto.index','description' => 'Ver listado de Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proyecto.create','description' => 'Crear Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proyecto.edit','description' => 'Editar Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proyecto.destroy','description' => 'Eliminar Proyectos'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.calendario.index','description' => 'Ver Eventos de Calendario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.create','description' => 'Crear Eventos de Calendario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.edit','description' => 'Editar Eventos Calendario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.destroy','description' => 'Eliminar Eventos Calendario'])->syncRoles([$role1, $role2]);
    
       
    }
}
