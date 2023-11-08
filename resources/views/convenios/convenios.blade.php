<x-app-layout>
   <div class="container  py-8">
    <div>
        <br>
        <br>
        <br>
        <br>
        <h1 class="text-4xl font-extrabold text-gray-900 text-center ">Convenios</h1>
        <br>
    </div>
    <div class="container-full py-8">
        <table class=" border-separate border-spacing-2  table-auto" >
            <thead>
                <tr class="py-4">
                  <th class="border text-xl bg-red-200">Resolución</th>
                  <th class="border text-xl bg-red-200">Nombre</th>
                  <th class="border text-xl bg-red-200">Tipo de Convenio</th>
                  <th class="border text-xl bg-red-200" >Objetivo</th>
                  <th class="border text-xl bg-red-200" >Coordinador</th>              
                  <th class="border text-xl bg-red-200">Fecha de Legalización</th>
                  <th class="border text-xl bg-red-200">Vigencia</th>
                </tr>
            </thead>
            <tbody class="py-4 px-4">
                @foreach ($convenios as $convenio)        
                <tr>
                  <td class="border  px-4 text-sm font-bold text-center bg-red-100" >{!! $convenio->resolucion !!}</td>
                  <td class="border px-4 text-base text-justify bg-red-100">{!! $convenio->nombre !!}</td>              
                  <td class="border px-4  text-base text-center bg-red-100">{!!$convenio->descripcion !!}</td>              
                  <td class="border px-4 text-base text-justify bg-red-100" >{!! $convenio->objetivo !!}</td>
                  <td class="border px-4 text-base text-center bg-red-100" >{!! $convenio->coordinador !!}</td>              
                  <td class="border px-4 text-base text-center bg-red-100" >{!! $convenio->fecha_legalizacion !!}</td>      
                  <td class="border px-4 text-base text-center bg-red-100" >{!!$convenio->vigencia !!}</td>
                </tr>
                @endforeach
            </tbody>
    
        </table>
    </div>
</div>
</x-app-layout>