/* INGRESAR ESCUELA Y DATOS */
INSERT INTO `escuela` (`id`, `nombre`, `mision`, `vision`, `telefono`, `email`, `mapa`, `malla`, `duracion`, `perfil`, `campo`, `titulo`, `modalidad`, `fecha_creación`, `logo_escuela`, `created_at`, `updated_at`) 
VALUES ('1', 'Escuela de Ingeniería Mecánica', 'Formar ingenieros mecánicos idóneos, competitivos, emprendedores, conscientes de su identidad local y nacional, justicia social, democracia y preservación, democracia y preservación del ambiente, a través de la generación, transmisión, adaptación y aplicación del conocimiento científico y tecnológico en el área mecánica para contribuir al desarrollo integral y sustentable del país, en consideración a las políticas del Plan Nacional del Buen Vivir.', 'Ser en el siguiente quinquenio la carrera de ingeniería mecánica líder en educación superior en el país y en el soporte científico, tecnológico e industrial, para el desarrollo integral de la provincia de Chimborazo y del país, con calidad, pertinencia y reconocimiento social.', '593(03) 2998-200 Ext', 'mecanica@espoch.edu.ec', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1994.07642890057!2d-78.678571!3d-1.655555!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe12e5a03f277fc67!2sFacultad%20de%20Ciencias%20-%20ESPOCH!5e0!3m2!1ses-419!2sec!4v1587590089807!5m2!1ses-419!2sec', 'PLAN DE ESTUDIOS DE CARRERA DE MECANICA.pdf', '10 semestres', 'Petróleo y derivados', 'Petróleo y derivados', 'Ingeniero/a Mecánico/a', 'Presencial', '1973-07-20', 'logo-mecanica-color2.png', NULL, NULL);
$table->string('nombre');  
            $table->string('telefono')->nullable();                                   
            $table->string('hoja_vida')->nullable();                       
            $table->string('foto')->nullable();     

            $table->enum('estado',[1,2])->default(1);

            $table->unsignedBigInteger('tipo_autoridad_id');


            $table->foreign('tipo_autoridad_id')
                    ->references('id')
                    ->on('tipo_autoridads')
                    ->onDelete('cascade');

/* Inseertar autoridades  */
INSERT INTO `autoridad` (`id`, `nombre`, `telefono`,`hoja_vida`, `foto`, `estado`, `tipo_autoridad_id`, `created_at`, `updated_at`) VALUES
(1, 'Ing. Marco Homero Almendariz Puente', '0987654321', 'Marco Armendariz.pdf', 'Marco Armendariz.jpg', 1, 1, NULL, NULL),
(2, 'Ing. José Francisco Pérez Fiallos', '0987654322', 'José francisco Perez.pdf', 'José francisco Perez.jpg', 1, 2, NULL, NULL),
(3, 'Msc. Edwin Viteri Nuñez', '0987654333', 'Edwin Viteri.pdf', 'Edwin Viteri.jpg', 1, 3, NULL, NULL);


/* Ingresar Tipo de integrante asociacion */
INSERT INTO `tipo_integrante` (`id`, `descripcion`) 
VALUES (14, 'DELEGADO DE COMISIÓN EJECUTIVA'), 
(15, 'DELEGADO DE COMISIÓN SOCIAL'), 
(9, 'Delegado de Secretaría de Inclusión y Equidad de Género'), 
(5, 'Delegado Principal Comité Ejecutivo Fepoch'), 
(11, 'Delegado Suplente Comité Ejecutivo Fepoch'), 
(6, 'FEPOCH Suplente'), (17, 'FEPOCH Suplente 3'), 
(18, 'FEPOCH Titular'), (7, 'LDP Principal '), 
(8, 'LDP Suplente '), (1, 'Presidente'), 
(12, 'Rep. Federación Alterno'), 
(19, 'Representante SIEG'), 
(3, 'Secretario'), 
(4, 'Tesorero'), 
(10, 'Vicepresidente');

/* Ingresar integrantes de asociacion  */
INSERT INTO `integrante`(`id`, `nombre`, `telefono`, `foto`, `email`, `estado`, `asociacion_id`, `tipo_integrante_id`) 
VALUES 
(1,'Marlon Enrique Abarca   Sigcho','0987654321','ASO_MEC_PRESIDENTE.jepg','marlon.abarca@espoch.edu.ec', 1 , 1, 1);



/* Insertar permisos */

INSERT INTO `permissions` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) 
VALUES (NULL, 'admin.users.destroy', 'Eliminar usuarios', 'web', NULL, NULL),
(NULL, 'admin.asociacion.index', 'Ver Asociación', 'web', NULL, NULL), 
(NULL, 'admin.asociacion.edit', 'Editar Asociación', 'web', NULL, NULL),

(NULL, 'admin.autoridades.create', 'Crear Autoridades', 'web', NULL, NULL), 
(NULL, 'admin.autoridades.destroy', 'Eliminar Autoridades', 'web', NULL, NULL), 

(NULL, 'admin.convenio.index', 'Ver Convenios', 'web', NULL, NULL),
(NULL, 'admin.convenio.create', 'Crear Convenios', 'web', NULL, NULL), 
(NULL, 'admin.convenio.edit', 'Editar Convenios', 'web', NULL, NULL),
(NULL, 'admin.convenio.destroy', 'Eliminar Convenios', 'web', NULL, NULL),

(NULL, 'admin.galerias.index', 'Ver Galerias', 'web', NULL, NULL),
(NULL, 'admin.galerias.create', 'Crear Galerías', 'web', NULL, NULL), 
(NULL, 'admin.galeria.edit', 'Editar Galerías', 'web', NULL, NULL),
(NULL, 'admin.galerias.destroy', 'Eliminar Galerías', 'web', NULL, NULL),

(NULL, 'admin.multimedias.index', 'Ver Imágenes', 'web', NULL, NULL),
(NULL, 'admin.multimedias.create', 'Subir Imágenes', 'web', NULL, NULL), 
(NULL, 'admin.multimedias.edit', 'Editar Imágenes', 'web', NULL, NULL),
(NULL, 'admin.multimedias.destroy', 'Eliminar Imágenes', 'web', NULL, NULL),

(NULL, 'admin.proyecto.index', 'Ver Proyectos', 'web', NULL, NULL), 
(NULL, 'admin.proyecto.create', 'Crear Proyectos', 'web', NULL, NULL), 
(NULL, 'admin.proyecto.edit', 'Editar Proyectos', 'web', NULL, NULL), 
(NULL, 'admin.proyecto.destroy', 'Eliminar Proyectos', 'web', NULL, NULL),

(NULL, 'admin.tipoautoridad.index', 'Ver Tipos de Autoridad', 'web', NULL, NULL), 
(NULL, 'admin.tipoautoridad.create', 'Crear Tipos de Autoridad', 'web', NULL, NULL), 
(NULL, 'admin.tipoaoutoridad.edit', 'Editar Tipos de Autoridad', 'web', NULL, NULL), 
(NULL, 'admin.tipoautoridad.destroy', 'Eliminar Tipos de Autoridad', 'web', NULL, NULL),

(NULL, 'admin.tipoconvenio.index', 'Ver Tipos de Convenio', 'web', NULL, NULL), 
(NULL, 'admin.tipoconvenio.create', 'Crear Tipos de Convenio', 'web', NULL, NULL), 
(NULL, 'admin.tipoconvenio.edit', 'Editar Tipos de Convenio', 'web', NULL, NULL), 
(NULL, 'admin.tipoconvenio.destroy', 'Eliminar Tipos de Convenio', 'web', NULL, NULL),

(NULL, 'admin.tipointegrantes.index', 'Ver Tipos de Integrantes', 'web', NULL, NULL), 
(NULL, 'admin.tipointegrantes.create', 'Crear Tipos de Integrantes', 'web', NULL, NULL), 
(NULL, 'admin.tipointegrantes.edit', 'Editar Tipos de Integrantes', 'web', NULL, NULL), 
(NULL, 'admin.tipointegrantes.destroy', 'Eliminar Tipos de Integrantes', 'web', NULL, NULL),

(NULL, 'admin.tipoproyecto.index', 'Ver Tipos de Proyectos', 'web', NULL, NULL), 
(NULL, 'admin.tipoproyecto.create', 'Crear Tipos de Proyectos', 'web', NULL, NULL), 
(NULL, 'admin.tipoproyecto.edit', 'Editar Tipos de Proyectos', 'web', NULL, NULL), 
(NULL, 'admin.tipoproyecto.destroy', 'Eliminar Tipos de Proyectos', 'web', NULL, NULL);

(NULL, 'admin.roles.index', 'Ver Roles', 'web', NULL, NULL), 
(NULL, 'admin.roles.create', 'Crear Roles', 'web', NULL, NULL), 
(NULL, 'admin.roles.edit', 'Editar Roles', 'web', NULL, NULL), 
(NULL, 'admin.roles.destroy', 'Eliminar Roles', 'web', NULL, NULL);