<x-app-layout>
    {{-- Autoridades de la Escuela y Facultad --}}
    <div class="container  py-8">
     <div>
         <br>
         <h1 class="text-4xl font-extrabold text-gray-900 text-center ">Grupos de Investigación</h1>
         <br>
     </div>
     <div class="container-full py-8">
         <table class=" border-separate border-spacing-2  table-auto" >
             <thead>
                 <tr class="py-4">
                   <th class="border text-xl bg-red-200">Código</th>
                   <th class="border text-xl bg-red-200">Nombre</th>
                   <th class="border text-xl bg-red-200">Siglas</th>
                   <th class="border text-xl bg-red-200">Misión</th>
                   <th class="border text-xl bg-red-200" >Visión</th>
                   <th class="border text-xl bg-red-200" >Investigadores</th>  
                   <th class="border text-xl bg-red-200" >Denominación</th>             
                   <th class="border text-xl bg-red-200">Lineas de Investigación</th>
                   <th class="border text-xl bg-red-200">Programas de Investigación</th>
                 </tr>
             </thead>
             <tbody class="py-4 px-4">
                 @foreach ($grupos_investigaciones as $grupo_investigacion)        
                 <tr>
                   <td class="border  px-4 text-sm font-bold text-center bg-red-100" >{{ $grupo_investigacion->codigo }}</td>
                   <td class="border px-4 text-base text-justify bg-red-100">{{ $grupo_investigacion->nombre }}</td>              
                   <td class="border px-4  text-base text-center bg-red-100">{{ $grupo_investigacion->siglas }}</td>              
                   <td class="border px-4 text-base text-justify bg-red-100" >{{ $grupo_investigacion->mision }}</td>             
                   <td class="border px-4 text-base text-justify bg-red-100" >{{ $grupo_investigacion->vision }}</td>
                   <td class="border px-4 text-base text-center bg-red-100" >{{ $investigadores->descripcion }}</td>              
                   <td class="border px-4 text-base text-center bg-red-100" >2</td>      
                   <td class="border px-4 text-base text-center bg-red-100" >3</td>
                 </tr>
                 @endforeach
             </tbody>
     
         </table>
     </div>
 </div>
 </x-app-layout>