<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
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
    <title>Tipo de servicio</title>
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

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
            
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            
            <div class="flex flex-col justify-center p-8 md:p-14">
                    
                <form action="{{ route('tipoServicio.insertar') }}" method="post">
                    @csrf

                    <h2 class="mb-3 text-4xl font-bold">Agregar tipo de servicio</h2>
                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Nombre de tipo servicio</label>
                        <input type="text" name="nombreTipoServicio" id="nombre" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required>
                    </div>

                    <div class="flex justify-center items-center pt-4">
                        <input type="submit" value="Guardar" class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
                    </div>
                </form>
                
                <br><hr style="height: 2px">

                <div class="mt-10">
                    <h2 class="mb-3 text-4xl font-bold">Tipos de servicios registrados</h2>

                    <table id="tabla-tipoServicio" class="w-full border-4 border-gray-300 table-auto" class="display nowrap" width="100%">
                        <thead class="border-4 bg-gray-200 border-gray-300 text-center">
                            <tr class="h-24">
                                <th class="linea-izquierda border-gray-300">Nombre de tipo de servicio</th>
                                <th class="linea-izquierda border-gray-300"></th>
                            </tr>
                        </thead>
                        @foreach ( $datosTipoServicio as $dato )
                            <tr class="h-20 text text-center linea-abajo border-gray-300">
                                <td class="linea-izquierda border-gray-300">{{ $dato->nombreTipoServicio }}</td>
                                <td class="linea-izquierda border-gray-300">
                                    <div>
                                        <div>
                                            <a href="{{route('tipoServicio.mostrarPorId', $dato->pkTipoServicio)}}">
                                                <svg class="w-[2rem] h-[2rem]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#000000"/>
                                                 </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tabla con DataTable
        $(document).ready(function () {
            $('#tabla-tipoServicio').DataTable({
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

    <style>
        .dataTables_filter {
            margin-bottom: 20px;
        }
        .bi {
            color: black;
            font-size: 20px;
        }
    </style>
    
</body>
</html>