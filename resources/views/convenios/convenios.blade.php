<x-app-layout>
    <div class="container py-8">
        <BR><BR>
        <div class="my-16 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900">Convenios</h1>
            <br>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 border-b">Resolución</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Nombre</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Tipo de Convenio</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Objetivo</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Coordinador</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Fecha de Legalización</th>
                        <th class="px-6 py-3 bg-gray-100 border-b">Vigencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($convenios as $convenio)
                        <tr>
                            <td class="px-6 py-4 border-b">{{ $convenio->resolucion }}</td>
                            <td class="px-6 py-4 border-b">{{ $convenio->nombre }}</td>
                            <td class="px-6 py-4 border-b">{{ $convenio->descripcion }}</td>
                            <td class="px-6 py-4 border-b">{{ $convenio->objetivo }}</td>
                            <td class="px-6 py-4 border-b">{{ $convenio->coordinador }}</td>
                            <td class="px-6 py-4 border-b">{{ $convenio->fecha_legalizacion }}</td>
                            <td class="px-6 py-4 border-b">{{ $convenio->vigencia }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
