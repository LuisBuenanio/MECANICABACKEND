<x-app-layout>
    <div class="container py-8">
        <br>
        <div class="my-16 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900">Proyectos</h1>
            
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 border-b">Código</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Nombre</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Tipo de Proyecto</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Objetivo</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Coordinador</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td class="px-6 py-4 border-b">{{ $proyecto->codigo }}</td>
                            <td class="px-6 py-4 border-b">{!! $proyecto->nombre !!}</td>
                            <td class="px-6 py-4 border-b">{!! $proyecto->descripcion !!}</td>
                            <td class="px-6 py-4 border-b">{!! $proyecto->objetivo !!}</td>
                            <td class="px-6 py-4 border-b">{{ $proyecto->coordinador }}</td>
                            <td class="px-6 py-4 border-b">
                                @if ($proyecto->ejecutandose == 1)
                                    <span class="text-green-500">En Ejecución</span>
                                @else
                                    <span class="text-gray-500">Ejecutado</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
