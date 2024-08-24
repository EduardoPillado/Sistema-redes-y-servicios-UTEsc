<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
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
    <title>Detalle dispositivo</title>
</head>
<body>
    
    @if(session('id'))
        @include("header")
        <!-- El resto de tu contenido aquí... -->
        @else
            <script>
                window.location.href="{{url('/login1')}}";
            </script>
    @endif 

    <div class="p-4 sm:ml-64 flex md:justify-center">
        
        <div class="p-4 mt-16 w-full md:w-3/4">
                <div class="mt-10">
                    <h2 class="mb-3 text-4xl font-bold">Imagenes del dispositivo</h2>
    
                    <table id="tabla-imagenes" class="w-full border-4 border-gray-300 table-auto" class="display nowrap" width="100%">
                        <thead class="border-4 bg-gray-200 border-gray-300 text-center">
                            <tr class="h-24">
                                <th class="linea-izquierda border-gray-300">Imagenes</th>
                            </tr>
                        </thead>
                        
                        @foreach ($datosDispositivo->fotos as $foto )
                            <tr class="h-20 text text-center linea-abajo border-gray-300">
                                <td class="linea-izquierda border-gray-300">
                                    <div>
                                        <img src="{{ $fotoRuta }}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

        <script>
            // Tabla con DataTable
            $(document).ready(function () {
                $('#tabla-imagenes').DataTable({
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
            });
        </script>

</body>
</html>