<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            margin-top: 30px;
        }
    </style>
    <title>Solicitudes</title>
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
    <div class="flex justify-center mt-[rem]">
        <div class="p-4 sm:ml-64 w-[30rem] md:w-[70rem]">
            
            <div class="p-4 shadow-2xl bg-white rounded-3xl mt-6">

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
                        <a href="{{ route('solicitud') }}" class="flex">
                            <span class="font-bold flex items-center mr-10">Agregar    
                                <svg class="w-8 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>         
                            </span> 
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-3 mt-[3rem] gap-4">
                    <input id="filtroMes" type="month" placeholder="fecha" id="filtroFecha" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                </div>

                <div class="mt-10">
                    <h2 class="mb-3 text-4xl font-bold text-center">Solicitudes registradas</h2>
                
                    <table class="w-full border-4 border-gray-300 table-auto" id="tabla-listaSolicitud" class="display nowrap" width="100%">
                        <thead class="border-4 bg-gray-200 border-gray-300 text-center">
                            <tr class="h-24">
                                <th class="linea-izquierda border-gray-300">Asunto</th>
                                <th class="linea-izquierda border-gray-300">Nombre destinatario </th>
                                <th class="linea-izquierda border-gray-300">Cargo destinatario </th>
                                <th class="linea-izquierda border-gray-300">Costo</th>
                                <th class="linea-izquierda border-gray-300">Fecha</th>
                                <th class="linea-izquierda border-gray-300">Solicitante</th>
                                <th class="linea-izquierda border-gray-300">Cargo solicitante</th>
                                <th class="linea-izquierda border-gray-300"></th>
                            </tr>
                        </thead>
                        @foreach ($datosSolicitud as $dato )
                            <tr class="h-20 text text-center linea-abajo border-gray-300">
                                <td class="linea-izquierda border-gray-300">{{ $dato->asunto }}</td>
                                <td class="linea-izquierda border-gray-300">{{ $dato->destinatario->nombreDestinatario." ".$dato->destinatario->apellidoPaternoDestinatario. " ".$dato->destinatario->apellidoMaternoDestinatario}}</td>
                                <td class="linea-izquierda border-gray-300">{{ $dato->destinatario->cargo }}</td>
                                <td class="linea-izquierda border-gray-300">{{ $dato->costo }}</td>
                                <td class="linea-izquierda border-gray-300">{{ $dato->fechaSolicitud }}</td>
                                <td class="linea-izquierda border-gray-300">{{ $dato->solicitante  }}</td>
                                <td class="linea-izquierda border-gray-300">{{ $dato->cargoSolicitante }}</td>
                                <td class="linea-izquierda border-gray-300 flex items-center justify-center gap-3">
                                    <a href="{{ route('solicitud.detalle', ['pkSolicitud' => $dato->pkSolicitud]) }}" class="mt-4">
                                        <svg class="w-[2rem] h-[2rem]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <path d="M12 17V11" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="#000000"/> <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> </g>
                                        </svg>
                                    </a>
                                    <a href="{{ route('solicitud.mostrarPorId', ['pkSolicitud' => $dato->pkSolicitud]) }}" class="mt-4">
                                        <svg viewBox="0 0 24 24" class="w-[2rem] h-[2rem]" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#000000"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{-- <button id="printButton" type="button" class="md:h-12 md:w-36 mt-5 w-32 text-neutral-800 border border-neutral-500 bg-gray-200 ring-neutral-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center">
                        <span>Imprimir</span>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var printButton = document.getElementById("printButton");

            printButton.addEventListener("click", function() {
                var printContent = document.getElementById("tabla-listaSolicitud").outerHTML;
                var printWindow = window.open('', '', 'width=800,height=600');
                printWindow.document.write('<html><head><title>Imprimir Tabla</title></head><body>');
                printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } th { background-color: #f2f2f2; } tr:nth-child(even) { background-color: #f2f2f2; }</style>');
                printWindow.document.write(printContent);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
        });
    </script> --}}

    <script>
        $(document).ready(function () {
            var table = $('#tabla-listaSolicitud').DataTable({
                responsive: true,
                "language": {
                    "search": "Buscar Solicitud:",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "zeroRecords": "Sin resultados",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                },
            });
            $('#busqueda').on('keyup', function (e) {
                var filtroBusqueda = $('#busqueda').val();
                table.search(filtroBusqueda).draw();
            });
            // Agrega el evento de cambio al filtro
            $('#filtroMes').change(function () {
                var filtroMes = $('#filtroMes').val();
                // Aplica filtros en las columnas correspondientes
                table.column(4).search(filtroMes).draw();
            });
        });
    </script>

</body>
</html>