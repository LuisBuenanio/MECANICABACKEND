<?php

namespace Database\Seeders;

use App\Models\Docente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docente::create([
            'nombre' => 'JOHN GERMAN VERA LUZURIAGA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'john.vera@espoch.edu.ec',              
            'titulo' => 'INGENIERIA ELECTRÓNICA EN CONTROL Y REDES INDUSTRIALES ESPOCH
            MASTÉR UNIVERSITARIO EN INGENIERÍA MECATRÓNICA UPV',              
            'descripcion' => 'Cuento con una experiencia laboral diversa, destacando como docente universitario en la ESPOCH durante 6 años, impartiendo cátedras de electrónica, control y automatización industrial. Además, desempeñé roles de supervisor eléctrico en Cemento Chimborazo por 1 año, operador en Justice Company por 1 año, técnico informático en el hospital IESS Riobamba por 2 años, y realicé una pasantía de 4 meses en la fábrica de motores de Ford España.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'NINGUNA PRUEBA',
            'estado' => '2',       
        ]); 
        Docente::create([
            'nombre' => 'MARCO VINICIO GUEVARA GRANIZO',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'marco.guevara@espoch.edu.ec',              
            'titulo' => 'Ingeniero Electrónico, PhD en Celdas Solares de silicio cristalino',              
            'descripcion' => 'Ingenierío Electrónico en control y automatización. Doctor en diseño y fabricación de celdas solares de silicio (Italia). Su investigación se centra en la simulación, optimización y fabricación de celdas solares de silicio cristalino con aplicacione en fotónica. Lidera un grupo dedicado al estudio y producción de materiales 2D como el grafeno, con aplicaciones en ingeniería mecánica.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'PRUEBA',
            'estado' => '2',       
        ]); 
        Docente::create([
            'nombre' => 'MIGUEL ANGEL ESCOBAR GUACHAMBALA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'jmaescobar@espoch.edu.ec',              
            'titulo' => 'Ingeniero Mecánico.
            Magister en Diseño, Producción y Automatización Industrial.',              
            'descripcion' => 'Ingeniero Mecánico de la Facultad de Mecánica, ESPOCH, Riobamba. Magister en Diseño, Producción y Automatización Industrial en la Facultad de Mecánica, EPN, Quito. Conocimientos en el área Diseño, manufactura  y validación asistida por computadora.  ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'NINGUNA PRUEBA',
            'estado' => '2',       
        ]); 
        Docente::create([
            'nombre' => 'GABRIEL VINICIO MOREANO SANCHEZ',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'gabriel.moreano@espoch.edu.ec',              
            'titulo' => 'INGENIERO EN ELECTRÓNICA Y CONTROL
            MÁSTER UNIVERSITARIO EN AUTOMÁTICA Y ROBÓTICA
            MÁSTER UNIVERSITARIO EN DISEÑO Y GESTIÓN DE PROYECTOS TECNOLÓGICOS',              
            'descripcion' => 'Ingeniero en Electrónica y Control por parte de la Escuela Politécnica Nacional “Cum Laude”, continua su formación profesional en la Universidad Politécnica de Madrid (UPM) donde obtiene el título de Máster Universitario en Automática y Robótica en el año 2017, en el mismo año obtiene el título de Máster Universitario en Diseño y Gestión de Proyectos Tecnológicos de la Universidad Internacional de la Rioja (UNIR),  ha acumulado varios méritos académicos y publicaciones científicas. Actualmente, cursa el programa doctoral en Ingeniería en la Pontifica Universidad Católica de Perú.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'BLANCA FAUSTINA HIDALGO PONCE',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'bhidalgo@espoch.edu.ec',              
            'titulo' => 'INGENIERO EN SISTEMAS
            MAGISTER EN INFORMATICA APLICADA
            DIPLOMADO EN MANEJO DE INFORMACION A TRAVES DE INTERNET',              
            'descripcion' => 'MIEMBRO DEL GRUPO DE INVESTIGACIÓN DE INGENIERÍA DE SOFTWARE GRIISOFT –FIE-ESPOCH. PRINCIPALES ÁREAS DE INVESTIGACIÓN: TRABAJO COLABORATIVO, SOFTWARE LIBRE, PROGRAMACIÓN INFORMÁTICA. HE EJERCIDO LA DOCENCIA UNIVERSITARIA 23 AÑOS',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'NINGUNA PRUEBA',
            'estado' => '2',       
        ]); 
        Docente::create([
            'nombre' => 'JUAN MANUEL MARTÍNEZ NOGALES',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'jumartinez@espoch.edu.ec',              
            'titulo' => 'IGENIERO MECÁNICO, MAGISTER EN CIENCIAS DE LA EDUCACIÓN APRENDIZAJE DE LA FÍSICA',              
            'descripcion' => 'Experiencia como Docente Politécnico durante 35 periodos académicos consecutivos,
            •    Docente de nivel medio 3 años,
            •    Docente -ESPOCH-FAC.MECÁNICA-octubre 2001- febrero 2011
            •    Docente- UNACH- marzo 2013- febrero 2017
            •	Docente -ESPOCH- Marzo2017-Continuo.
            .  Experto en Procesos E-Learning
            •    Miembro de la ASOCIACION MUNDIAL DE TURORES VIRTUALES
            
             ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'ISIDORO ENRIQUE TAPIA SEGARRA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'itapia@espoch.edu.ec',              
            'titulo' => 'Ingeniero Mecánico-Magister en Seguridad Industrial-Mención riesgos laborales y salud ocupacional-Tengo terminado la instrucción de maestría en Matemática y actualmente estoy terminando mi tesis.',              
            'descripcion' => 'Soy ingeniero mecánico de la ESPOCH, mi carrera profesional inicie en la Compañia Azul con Superintendente de Campo en el Oriente, luego fui designado Director Ejecutivo del Servicio de Vivienda Popular Alternativa SEVIPAL de la Diócesis de Riobamba en la que ejecute varios programas de vivienda popular en la provincia de Chimborazo, posteriormente estuve en libre ejercicio profesional en la contratación pública construyendo estructuras metálicas, actualmente llevo 15 años de docente en la Espoch como docente contratado.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'NINGUNA PRUEBA',
            'estado' => '2',       
        ]); 


        /*----------------------------------------------------- */

        Docente::create([
            'nombre' => 'JOSE LUIS PEREZ ROJAS',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'jose.perezl@espoch.edu.ec',              
            'titulo' => 'Ingeniero en Electrónica y Telecomunicaciones. Máster Universitario en Ingeniería Matemática y Computación. ',              
            'descripcion' => 'Ingeniero en Electrónica y Telecomunicaciones con una Maestría en Ingeniería en Matemática y Computación. Soy docente universitario desde el año 2017, gracias al campo amplio y específico imparto  regularmente las asignaturas de Análisis Matemático 1, Métodos Numéricos, Análisis y Resolución de Problemas, Algebra lineal y Programación en la Facultad de Mecánica. Formo parte del grupo de Investigación  GDP (GRUPO DE DESARROLLO Y PRODUCCIÓN), actualmente trabajo en dos proyectos  de Vinculación .He sido ponente en congresos nacionales e internacionales, presentando los resultados de mis investigaciones y plasmándolas en artículos científicos. Escribí un libro sobre Métodos Numéricos para Ciencias en Ingeniería en el año 2022. En la actualidad estoy elaborando un proyecto de investigación para su posterior aprobación y además espero la revisión por pares de dos libros sobre Análisis Matemático 1.
            ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'NINGUNA PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'SANTIAGO ALEJANDRO LÓPEZ ORTIZ',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'sa_lopez@espoch.edu.ec',              
            'titulo' => 'INGENIERO MECÁNICO
            MAGISTER EN DISEÑO MECÁNICO',              
            'descripcion' => 'Ingeniero Mecánico con un alto espíritu de dedicación y constancia. Instruido y capacitado en diferentes áreas de la Ingeniería Mecánica e Ingeniería Automotriz. Con la visión de propulsar el desarrollo tecnológico y académico de los nuevos profesionales, alta competencia para el ámbito de investigación. Formación doctoral en áreas de simulación numérica, metodología de diseño, carrocerías de autobuses junto con la experiencia para desarrollar ensayos experimentales con equipos de impacto y sistemas de adquisición datos.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => 'NINGUNA PRUEBA',
            'estado' => '2',       
        ]); 
        

        Docente::create([
            'nombre' => 'LIDIA DEL ROCÍO CASTRO CEPEDA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'lidia.castro@espoch.edu.ec',              
            'titulo' => 'Máster Universitario en Ingeniería de la Energía
            Máster Universitario en Ingeniería Matemática y Computación',              
            'descripcion' => 'Ingeniera Industrial, de la Escuela Superior Politécnica de Chimborazo, Ecuador (2014), Máster Universitario en Ingeniería de la Energía, de la Universidad Politécnica de Madrid, España (2017), Máster Universitario en Ingeniería Matemática y Computación de la Universidad Internacional de la Rioja, España (2021). Docente de educación superior en la Escuela Superior Politécnica de Chimborazo en la Facultad de Mecánica. Autora de artículos de investigación y libros, he participado en cursos, talleres, seminarios y congresos a nivel nacional e internacional. ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'NESTOR ALCIVAR ULLOA AUQUI',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'nestor.ulloa@espoch.edu.ec ',              
            'titulo' => 'Ingeniero Mecánico
            Magíster en Ciencia e Ingeniería de Materiales',              
            'descripcion' => 'Ingeniero Mecánico, Graduado de la Escuela de Ingeniería Mecánica (ESPOCH) formado y capacitado con conocimientos científicos y prácticos, como también con valores éticos y morales capaz de dar solución a todo tipo de problemas planteados en las áreas de Diseño, Sistemas Neumáticos, Automatización, Bombeo Hidráulico, Montaje y Mantenimiento de maquinaria industrial. Magister en Ciencias e Ingeniería de Materiales, Graduado de la Escuela en Ingeniería Mecánica y Ciencias de la Producción-FIMCP, ESPOL, con una amplia experiencia teórico-práctico en: Seleccionar Materiales, Analizar fallas, Evaluar inhibidores de corrosión, determinar la selección adecuada de metales para la reducción de los efectos de corrosión en materiales y equipos, labores educativas e investigativas en el capo de la Ciencia e Ingeniería de materiales, Síntesis, caracterización de hormigones y morteros de CPO,  síntesis y caracterización de hormigones y morteros de geo polímeros, síntesis y caracterización de materiales desarrollados a partir de la tecnología nano, conocimientos amplios sobre la síntesis y la caracterización de grafeno y nanotubos de carbono y sus aplicaciones, capacitado en el uso de instrumentos analíticos de caracterización de materiales: SEM, XRD, FT-IR, TGA-DSC, Mastersizer,(analizador de tamaño de partícula), capacitado en ensayos destructivos de materiales, etc.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'MONICA ALEXANDRA MORENO BARRIGA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'monica.moreno@espoch.edu.ec',              
            'titulo' => 'MAGISTER EN SISTEMAS INTEGRADOS DE GESTION DE LA CALIDAD, MEDIO AMBIENTE Y SEGURIDAD; INGENIERA INDUSTRIAL; TECNOLOGA QUIMICA INDUSTRIAL',              
            'descripcion' => 'Magister en Sistemas Integrados de Gestión de la Calidad, Medio Ambiente y Seguridad, Ingeniera Industrial, con una sólida formación académica y profesional desarrollada en el Área de Dirección de la empresa privada, con cargos de Gerencia y Jefaturas de Plantas Industriales del Sector Alimenticio, con capacidad en la toma efectiva de decisiones y manejo de los recursos, liderazgo para el manejo de capital humano. Alto espíritu de superación y perseverancia en las actividades desarrolladas a nivel laboral y académico.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'GINNO SIDNEY JARRIN ZAMBRANO',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'sidney.jarrin@espoch.edu.ec',              
            'titulo' => 'INGENIERO EN ADNMINISTRACIÓN 
            MAGISTER EN GERENCIA EDUCATIVA
            DIPLOMADO EN GESTIÓN EDUCATIVA',              
            'descripcion' => 'INGENIERO EN ADMINISTRACIÓN DE EMPRESAS, MAGISTER EN GERENCIA EDUCATIVA, DIPLOMADO EN GESTIÓN EDUCATIVA, PROFESOR DE LA ESPOCH, ACADÉMICAMENTE. EN LO LABORAL AUDITOR AUXILIAR DE LA EMPRESA ELECTRICA COTOPAXI, DIRECTOR DE GESTIÓN DE RIESGOS GADM RIOBAMBA, RELACIONISTA PÚBLICO DE LA CEMENTO CHIMORAZO S.A. ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'JAVIER EDMUNDO ALBUJA JACOME',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'javier.albuja@espoch.edu.ec',              
            'titulo' => 'Ingeniero Automotriz',              
            'descripcion' => 'Ingeniero Automotriz con maestría en Diseño Mecánico, actualmente estoy laborando en la ESPOCH, también desempeñe labores como conductor profesional.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'ANDRES JOAO NOGUERA CUNDAR',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'andres.noguera@espoch.edu.ec',              
            'titulo' => 'Ingeniero Automotriz
            Master en Ingeniería Mecánica',              
            'descripcion' => 'Ingeniero Automotriz (ESPOCH, 2012) Máster en Ingeniería Mecánica (Universidad Politécnica de Madrid, 2017). Colaborador de investigación en seguridad en transporte colectivo de personas, vehículos, sistemas de protección y movilidad, con la aportación de un estudio de patrones de comportamiento de las mujeres en relación con los varones, en los accidentes de tráfico en España. Becario Senescyt 2015. Experiencia profesional en taller Automotriz Hyundai Motor Company. Docente Universitario 2017 a la actualidad.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'LUIS FRANCISCO MANTILLA CABRERA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'luis.mantilla@espoch.edu.ec',              
            'titulo' => 'Licenciado en Ciencias  de la Educacion : Profesor de Inglés UNACH
            Magister en lingüística aplicada a la enseñanza bilingüe PUCE',              
            'descripcion' => 'Estudió Filosofía Sociología y Economía en la Universidad de Cuenca.
            Profesor de educación primaria y secundaria por 5 años.
            Profesor de  la  Carrera de Idiomas Universidad Nacional de Chimborazo por 5 años
            Profesor de Inglés en Cambridge- ESPOCH por 6 años . 
            Docente Titular de la Facultad de Mecánica de la ESPOCH desde el año 2020
            ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'DIEGO FERNANDO MAYORGA PÉREZ',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'dmayorga@espoch.edu.ec',              
            'titulo' => 'MAGISTER EN SEGURIDAD Y PREVENCION DE RIESGOS DEL TRABAJO
            MASTER UNIVERSITARIO EN INGENIERIA MATEMATICA Y COMPUTACION',              
            'descripcion' => 'Ingeniero Mecánico de la ESPOCH, he trabajado con el MINISTERIO DE COORDINACION DE LA PRODUCCION, EMPLEO Y COMPETITIVIDAD MCPEC, Docente del Área de Medio Ambiente, Seguridad y Metrología (Tengo Formación de METROLOGO – INEN del que soy coordinador del convenio Marco y Específico entre ambas instituciones), a demás, actualmente me desenvuelvo en la docencia y en la seguridad industrial en el parque industrial de Riobamba. ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'SOCRATES MIGUEL AQUINO ARROBA',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'saquino@espoch.edu.ec',              
            'titulo' => 'Ingeniero Mecánico
            Master Diseño, producción y automatización industrial
            ',              
            'descripcion' => 'Ingeniero mecánico con especialización en mecanismos y análisis de elementos finitos, enfocado en el desarrollo y ejecución de proyectos en el campo de la ingeniería mecánica. Posee una sólida experiencia en la investigación y diseño de mecanismos avanzados, así como en la aplicación de técnicas de simulación por elementos finitos para optimizar y validar diseños. Su formación se complementa con una especialización en el área de biomecánica. Su  trayectoria demuestra una habilidad probada para abordar desafíos técnicos complejos y transformarlos en soluciones innovadoras y funcionales. Apasionado por la creación y aplicación de conocimientos que contribuyan al avance de la ingeniería y la salud humana.',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 


        Docente::create([
            'nombre' => 'CARLOS OSWALDO SERRANO AGUIAR',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'carlos.serrano@espoch.edu.ec',              
            'titulo' => 'MAGISTER EN INGENIERIA MECANICA CON MENCION EN MATERIALES Y PROCESOS DE MANUFACTURA

            MASTER UNIVERSITARIO EN INGENIERIA MATEMATICA Y COMPUTACION',              
            'descripcion' => 'Ingeniero Mecánico con sólida formación y experiencia en ingeniería. Maestría en Ingeniería Mecánica (Mención en Materiales y Procesos de Manufactura) y Máster en Ingeniería Matemática y Computación. Ha sido Supervisor de QA/QC Mecánico en Petrocompany y docente en asignaturas como Ciencia de Materiales, Soldadura y Matematicas. Cuenta con experiencia en investigación, habilidades en manejo de equipos de laboratorio y certificaciones en Inspección Visual y Tintas Penetrantes. ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'Sandra Leticia Guijarro Paguay',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'sandra.guijarro@espoch.edu.ec',              
            'titulo' => 'Diploma Superior en Metodología para la Enseñanza del Idioma Inglés
            Magister en Lingüística Aplicada al Aprendizaje del inglés ',              
            'descripcion' => 'Docente con formación en Ciencias de la Educación: Profesora de Idioma Ingles. Quien  ha palpado la realidad ecuatoriana en los niveles: pre-básica, básica inferior, básica superior, Bachillerato y universitario.  Experiencias que le han motivado a capacitarse dentro y fuera del país para cambiar su paradigma tradicionalista en la enseñanza del Idioma Ingles por uno mas dinámico y participativo.  
            ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'NELSON SANTIAGO CHUQUIN VASCO',
            'telefono' => '',  
            'foto' => 'docente.png',              
            'email' => 'nelson.chuquin@espoch.edu.ec',              
            'titulo' => 'MASTER EN INGENIERÍA HIDRÁULICA Y MEDIO AMBIENTE',              
            'descripcion' => 'Ingeniero Mecánico de la Escuela Superior Politécnica de Chimborazo, Máster Universitario en Ingeniería Hidráulica y Medio Ambiente de la Universidad Politécnica de Valencia - España, con 2 años de experiencia en el sector petrolero en el área de Bombeo Hidráulico, Redes de Distribución y Estaciones de Bombeo, 6 años de experiencia en Docencia Universitaria en la Facultad de Mecánica – Carrera de Mecánica (ESPOCH – RIOBAMBA), además 5 años como Coordinador para el Aseguramiento de la Calidad de la Carrera de Ingeniería Mecánica. ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 

        Docente::create([
            'nombre' => 'EDWDIN FERNANDO VITERI NÚÑEZ',
            'telefono' => '',  
            'foto' => 'msc-edwin-viteri-nunez.jpg',              
            'email' => 'eviteri@espoch.edu.ec',              
            'titulo' => 'INGENIERO MECÁNICO
            MAGISTER EN GERENCIA DE PROYECTOS 
            DOCTOR EN CIENCIAS ADMINISTRATIVAS',              
            'descripcion' => 'Ingeniero Mecánico en la ESPOCH, Magister en Gerencia de Proyectos en la UTA, y Doctor en Ciencias Administrativas dela UNMSM. he desarrollado cargos administrativos y gerenciales en la empresa privada en las áreas de diseño mecánico, estructuras y proyectos. Docente de la Carrera de Mecánica desde el año 2012, actualmente coordinador de Carrera, pertenezco al grupo de investigación GIDETER, una de las líneas de investigación es la aplicación de nanomateriales. ',                         
            'hoja_vida' => 'hoja_vida_docente_1.pdf',             
            'asignatura' => ' PRUEBA',
            'estado' => '2',       
        ]); 
        
        
        




    }
}
