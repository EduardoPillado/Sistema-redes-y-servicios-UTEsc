<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <link rel="stylesheet" href="../css/input.css">
    <link rel="stylesheet" href="../dist/output.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Detalle ruta</title>
</head>
<body>
    
@include('header')
@include('mensaje')

@if(session('id'))
        @include("header")
        <!-- El resto de tu contenido aquí... -->
        @else
            <script>
                window.location.href="{{url('/login1')}}";
            </script>
    @endif
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

    <div class="p-4 sm:ml-64 flex md:justify-center">
       
        <div class="p-4 mt-16 w-full md:w-3/4">
            <div>   
                <div class="flex mt-10 border-2 border-neutral-800 rounded-3xl items-center justify-center h-12 md:h-20 md:justify-start">
                <h1 class="text-center text-xl ml-3 text-neutral-800 md:text-3xl md:ml-8">{{$datosRed->nombreRed}}</h1>
                </div>
                    <div class="mt-10">
                        <div class="flex border-2 border-gray-300 justify-between">
                            <div class="bg-gray-200 w-2/4 h-24 text-center items-center flex justify-star">
                                <h1 class="font-bold text-xl ml-5">Tipo de ruta</h1>
                            </div>
                            <div class=" w-2/4 h-24 text-center items-center flex justify-center lineaderecha border-gray-300">
                                <span class="truncate text-clip overflow-hidden">{{$datosRed->tipoRed_nombre}}</span>
                            </div>
                        </div>
                        {{-- <div class="flex border-2 border-gray-300 justify-between">
                            <div class="bg-gray-200 w-2/4 h-24 text-center items-center flex justify-star">
                                <h1 class="font-bold text-xl ml-5">Área</h1>
                            </div>
                            <div class=" w-2/4 h-24 text-center items-center flex justify-center lineaderecha border-gray-300">
                                <span class="truncate text-clip overflow-hidden">{{$datosRed->nom_numArea}}</span>
                            </div>
                        </div>
                        <div class="flex border-2 border-gray-300 justify-between">
                            <div class="bg-gray-200 w-2/4 h-24 text-center items-center flex justify-star">
                                <h1 class="font-bold text-xl ml-5">Edificio</h1>
                            </div>
                            <div class=" w-2/4 h-24 text-center items-center flex justify-center lineaderecha border-gray-300">
                                <span class="truncate text-clip overflow-hidden">{{$datosRed->nombreEdificio}}</span>
                            </div>
                        </div> --}}
                        <div class="flex border-2 border-gray-300 justify-between">
                            <div class="bg-gray-200 w-2/4 h-24 text-center items-center flex justify-star">
                                <h1 class="font-bold text-xl ml-5">VLAN</h1>
                            </div>
                            <div class=" w-2/4 h-24 text-center items-center flex justify-center lineaderecha border-gray-300">
                                <span class="truncate text-clip overflow-hidden">
                                    @if ($datosRed->vlan !== null)
                                        {{ $datosRed->vlan }}
                                    @else
                                        <p style="color: rgb(73, 73, 73);">La ruta no pertenece a ninguna VLAN</p>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex border-2 border-gray-300 justify-between">
                            <div class="bg-gray-200 w-2/4 h-24 text-center items-center flex justify-star">
                                <h1 class="font-bold text-xl ml-5">Fecha de creación</h1>
                            </div>
                            <div class=" w-2/4 h-24 text-center items-center flex justify-center lineaderecha border-gray-300">
                                <span class="truncate text-clip overflow-hidden">{{$datosRed->fecha}}</span>
                            </div>
                        </div>
                        

                        {{-- <div class="flex border-2 border-gray-300 justify-between">
                            <div class="md:w-2/4 bg-gray-200">
                            <div class="hidden md:flex bg-gray-200 mr-3 md:mr-0 h-24 items-center flex justify-start">
                                <h1 class="font-bold text-xl ml-5">Opciones</h1>
                            </div>
                            </div>
                            <div class="md:w-1/6 w-2/6 h-24 text-center items-center flex justify-center lineaderecha border-gray-300">
                                <div class="flex justify-center md:justify-end font-bold">
                                    <a href="{{ route('red.mostrarPorId', ['pkRed' => $datosRed->pkRed, 'vista' => 'editarRed']) }}"W class="flex">
                                        <span class="flex items-center">Editar Red           
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-8 mr-1" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M364.13 125.25L87 403l-23 45 44.99-23 277.76-277.13-22.62-22.62zM420.69 68.69l-22.62 22.62 22.62 22.63 22.62-22.63a16 16 0 000-22.62h0a16 16 0 00-22.62 0z"/></svg>
                                        </span> 
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            <div class="mt-10">
                <h2 class="mb-3 text-4xl font-bold">Dispositivos asociados</h2>

                <table id="tabla-dispositivos" class="w-full border-4 border-gray-300 table-auto" class="display nowrap" width="100%">
                    <thead class="border-4 bg-gray-200 border-gray-300 text-center">
                        <tr class="h-24">
                            <th class="linea-izquierda border-gray-300">Nombre</th>
                            <th class="linea-izquierda border-gray-300">Serie</th>
                            <th class="linea-izquierda border-gray-300">Modelo </th>
                            <th class="linea-izquierda border-gray-300">Marca</th>
                        </tr>
                    </thead>
                
                    @foreach ($datosDispositivo as $datos )
                        <tr class="h-20 text text-center linea-abajo border-gray-300">
                            <td class="linea-izquierda border-gray-300">{{ $datos->nombre }}</td>
                            <td class="linea-izquierda border-gray-300">{{ $datos->serie}}</td>
                            <td class="linea-izquierda border-gray-300">{{ $datos->modelo_nombre }}</td>
                            <td class="linea-izquierda border-gray-300">{{ $datos->marca_nombre}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

    <script>
        // Tabla con DataTable
        $(document).ready(function () {
            $('#tabla-dispositivos').DataTable({
                "language": {
                "search": "Buscar:",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "zeroRecords": "Sin resultados",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

</body>
</html>