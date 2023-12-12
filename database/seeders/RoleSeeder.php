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


        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create','description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Editar Usuarios'])->syncRoles([$role1]);
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
          
        Permission::create(['name' => 'admin.integrantes.index','description' => 'Ver listado de Integrantes de Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.integrantes.create','description' => 'Crear Integrantes de Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.integrantes.edit','description' => 'Editar Integrantes de Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.integrantes.destroy','description' => 'Eliminar Integrantes de Asociación'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.tipointegrantes.index','description' => 'Ver listado de Tipo de Integrante Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipointegrantes.create','description' => 'Crear Tipo de Integrante Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipointegrantes.edit','description' => 'Editar Tipo de Integrante Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipointegrantes.destroy','description' => 'Eliminar Tipo de Integrante Asociación'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.asociacion.index','description' => 'Ver Datos Asociación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.asociacion.edit','description' => 'Editar Datos Asociación'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.tipoautoridad.index','description' => 'Ver listado de Tipo de Autoridad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoautoridad.create','description' => 'Crear Tipo de Autoridad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoautoridad.edit','description' => 'Editar Tipo de Autoridad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoautoridad.destroy','description' => 'Eliminar Tipo de Autoridad'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.autoridades.index','description' => 'Ver listado de Autoridades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.autoridades.create','description' => 'Crear Autoridades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.autoridades.edit','description' => 'Editar Autoridades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.autoridades.destroy','description' => 'Eliminar Autoridades'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.galerias.index','description' => 'Ver listado de Galerías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.galerias.create','description' => 'Crear Galerías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.galerias.edit','description' => 'Editar Galerías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.galerias.destroy','description' => 'Eliminar Galerías'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.multimedias.index','description' => 'Ver listado de Imágenes de Galería'])->syncRoles([$role1, $role2]);
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
    
        Permission::create(['name' => 'admin.proyectos.index','description' => 'Ver listado de Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proyectos.create','description' => 'Crear Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proyectos.edit','description' => 'Editar Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proyectos.destroy','description' => 'Eliminar Proyectos'])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.calendario.index','description' => 'Ver Eventos de Calendario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.create','description' => 'Crear Eventos de Calendario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.edit','description' => 'Editar Eventos Calendario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.destroy','description' => 'Eliminar Eventos Calendario'])->syncRoles([$role1, $role2]);
    

        Permission::create(['name' => 'admin.slider.index','description' => 'Ver Imagenes de Portada'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.slider.create','description' => 'Crear Imagen de Portada'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.slider.edit','description' => 'Editar Imágenes de Portada '])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.slider.destroy','description' => 'Eliminar Imágenes de Portada '])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.docentes.index','description' => 'Ver Docentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.docentes.create','description' => 'Crear Docentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.docentes.edit','description' => 'Editar Docentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.docentes.destroy','description' => 'Eliminar Docentes '])->syncRoles([$role1, $role2]);
    
        Permission::create(['name' => 'admin.titulacion.index','description' => 'Ver Datos Titulación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.titulacion.edit','description' => 'Editar Datos Titulación'])->syncRoles([$role1, $role2]);
       
        Permission::create(['name' => 'admin.tipotitulacion.index','description' => 'Ver Datos de los Tipos de Titulación'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipotitulacion.edit','description' => 'Editar Datos de los Tipos de Titulación'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.secretaria.index','description' => 'Ver Datos de Secretaria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.secretaria.edit','description' => 'Editar Datos de Secretaria'])->syncRoles([$role1, $role2]);
      
        Permission::create(['name' => 'admin.maestrias.index','description' => 'Ver Maestrias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.maestrias.create','description' => 'Crear Maestrias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.maestrias.edit','description' => 'Editar Maestrias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.maestrias.destroy','description' => 'Eliminar DocMaestriasentes '])->syncRoles([$role1, $role2]);
    
        
    }
}
