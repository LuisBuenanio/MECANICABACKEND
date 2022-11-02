<x-app-layout>
    {{-- Autoridades de la Escuela y Facultad --}}
    <div class="container  py-8">
     <div>
         <br>
         <h1 class="text-4xl font-extrabold text-gray-900 text-center ">Proyectos</h1>
         <br>
     </div>
     <div class="container-full py-8">
         <table class=" border-separate border-spacing-2  table-auto" >
             <thead>
                 <tr class="py-4">
                   <th class="border text-xl bg-red-200">Código</th>
                   <th class="border text-xl bg-red-200">Nombre</th>
                   <th class="border text-xl bg-red-200">Tipo de Proyecto</th>
                   <th class="border text-xl bg-red-200" >Objetivo</th>
                   <th class="border text-xl bg-red-200" >Coordinador</th> 
                 </tr>
             </thead>
             <tbody class="py-4 px-4">
                 @foreach ($proyectos as $proyecto)        
                 <tr>
                   <td class="border  px-4 text-sm font-bold text-center bg-red-100" >{!! $proyecto->codigo !!}</td>
                   <td class="border px-4 text-base text-justify bg-red-100">{!! $proyecto->nombre !!}</td>              
                   <td class="border px-4  text-base text-center bg-red-100">{!! $proyecto->descripcion !!}</td>              
                   <td class="border px-4 text-base text-justify bg-red-100" >{!! $proyecto->objetivo !!}</td>
                   <td class="border px-4 text-base text-center bg-red-100" >{!! $proyecto->coordinador !!}</td> 
                 </tr>
                 @endforeach
             </tbody>
     
         </table>
     </div>
 </div>
 </x-app-layout>