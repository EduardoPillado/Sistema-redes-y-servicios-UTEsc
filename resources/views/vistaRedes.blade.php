
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        div.container { 
            max-width: 1200px;
        }
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
            padding: 4px;
            width: 60px;
            margin-bottom: 20px;
        }
    </style>
    <title>Rutas</title>
</head>
<body class="bg-gray-100">

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

    @php
        use App\Models\TipoArea;
        $datosTipoArea = TipoArea::where('estatusTipoArea', '=', 1)->get();

        use App\Models\Edificio;
        $datosEdificio = Edificio::where('estatus', '=', 1)->get();

        use App\Models\Area;
        $datosArea = Area::where('area.estatusArea', '=', 1)->get();

        use App\Models\TipoRed;
        $datosTipoRed = TipoRed::where('estatusTipoRed', '=', 1)->get();
    @endphp

        <div class="p-4 sm:ml-64">
            <div class="p-4 bg-white shadow-2xl rounded-2xl mt-[2rem]">
                <div class="flex justify-between">
                    <form class="w-[13rem] md:w-[25rem]">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="busqueda" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar" required>
                        </div>
                    </form>
                    <div class="flex">
                        <a href="{{ route('agregarRed') }}" class="flex">
                            <span class="font-bold flex items-center mr-10">Agregar    
                                <svg class="w-8 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>         
                            </span> 
                        </a>
                    </div>
                 </div>
                 <div class="grid grid-cols-2 mt-[3rem] gap-4">
                   
                    {{-- <select id="filtroArea" type="text" class="p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="serv" id="serv">
                            <option selected value="">Selecciona un area</option>
                            @foreach ($datosArea as $dp)
                                <option value="{{$dp->nom_numArea}}">{{$dp->nom_numArea}}</option>
                            @endforeach
                    </select> --}}
                    <select id="filtroTipoRed" type="text" class="p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="serv" id="serv">
                   
                         <option selected value="">Selecciona tipo red</option>
                            @foreach ($datosTipoRed as $dp)
                                <option value="{{$dp->nombre}}">{{$dp->nombre}}</option>
                            @endforeach
                    </select>
                    <input id="filtroFecha" type="date" id="fecha" name="fecha">
                    <button id="limpiarFiltros">Limpiar filtros</button>
                  
                 </div>
                    <div class="mt-10">
                    <h2 class="mb-3 text-4xl font-bold text-center">Rutas registradas</h2>

                    <table class="w-full border-4 border-gray-300 table-auto" id="tabla-redes" class="display nowrap" width="100%">
                        <thead class="border-4 bg-gray-200 border-gray-300">
                            <tr class ="h-24">
                                <th class="linea-izquierda border-gray-300">Num.</th>
                                <th class="linea-izquierda border-gray-300">Nombre de la red</th>
                                <th class="linea-izquierda border-gray-300">Tipo de ruta</th>
                                <th class="linea-izquierda border-gray-300">VLAN</th>
                                <th class="linea-izquierda border-gray-300">Fecha levantamiento:</th>
                                <th class="linea-izquierda border-gray-300">Detalles de red</th>
                            </tr>
                            <tbody>
                            @foreach($datosRed as $dato)
                                <tr class="h-20 text text-center linea-abajo border-gray-300">
                                    <td class="linea-izquierda border-gray-300">{{$dato->pkRed}}</td>
                                    <td class="linea-izquierda border-gray-300">{{$dato->nombreRed}}</td>
                                    <td class="linea-izquierda border-gray-300">{{$dato->tipoRed_nombre}}</td>
                                    <td class="linea-izquierda border-gray-300">
                                        @if ($dato->vlan !== null)
                                            {{ $dato->vlan }}
                                        @else
                                            <p style="color: rgb(73, 73, 73);">La ruta no pertenece a ninguna VLAN</p>
                                        @endif
                                    </td>
                                    <td class="linea-izquierda border-gray-300">{{$dato->fecha}}</td>
                                    <td  class="linea-izquierda border-gray-300 flex justify-center">
                                        <a href="{{ route('red.detalle', ['pkRed' => $dato->pkRed]) }}" class="mt-4">
                                            <svg class="w-[2rem] h-[2rem]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                <g id="SVGRepo_iconCarrier"> <path d="M12 17V11" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="#000000"/> <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> </g>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </thead>
                    </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        
        <script>
              $(document).ready(function () {
            var table = $('#tabla-redes').DataTable({
                responsive: true,
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

            $(' #filtroArea, #filtroEdificio,#filtroTipoRed, #filtroFecha').change(function () {
                var filtroArea = $('#filtroArea').val();
                var filtroTipoRed = $('#filtroTipoRed').val();
                var filtroFecha = $('#filtroFecha').val();
                var filtroEdificio = $('#filtroEdificio').val();

                // Aplica filtros en las columnas correspondientes
              
                table.column(2).search(filtroTipoRed).draw();
               
                table.column(4).search(filtroFecha).draw();
            });
            $('#busqueda').on('keyup', function (e) {
        var filtroBusqueda = $('#busqueda').val();
        table.search(filtroBusqueda).draw();
    });
            // Limpiar los filtros al hacer clic en el botón "Limpiar Filtros"
            $('#limpiarFiltros').on('click', function () {
                $('#filtroEdificio, #filtroArea, #filtroEdificio,#filtroTipoRed, #filtroFecha').val('');
                table.search('').columns().search('').draw();
            });
        });

        </script>
</body>
