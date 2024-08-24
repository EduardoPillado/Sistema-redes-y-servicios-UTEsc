<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <link rel="stylesheet" href=""> 
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <title>Ruta</title>
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
                            
                <span class="mb-3 text-4xl font-bold">Agregar ruta</span>

                @php
                    use Carbon\Carbon;

                    use App\Models\TipoRed;
                    $datosTipoRed = TipoRed::where('estatusTipoRed', '=', 1)->get();

                    use App\Models\Dispositivo;
                    $datosDispositivo = Dispositivo::where('estatus', '=', 1)->get();
                @endphp
    
                <form action="{{ route('red.insertar') }}" method="post">
                    @csrf

                    <div class="py-4">
                        <label for="nombreRed">Nombre de la ruta</label>
                        <input type="text" name="nombreRed" id="nombreRed" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <h3 class="mb-2 text-md">Seleccioan dispositivos y puertos</h3>
                        <table>
                            <thead class="bg-gray-50">
                                <tr class="bg-white">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Selección</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre dispositivo</th>
                                </tr>
                            </thead>

                            @foreach ($datosDispositivo as $dato )
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <input type="checkbox" name="fkDispositivo[]"
                                            value="{{ $dato->pkDispositivo }}" 
                                            class="seleccionado"
                                            >
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $dato->nombre  }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    
                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkTipoRed">Tipo de ruta</label> - <a href="{{ url('tipoRed') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select name="fkTipoRed" id="fkTipoRed" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosTipoRed as $dp)
                                <option value="{{$dp->pkTipoRed}}">{{$dp->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="py-4">
                        <input name="vlan" placeholder="Ingresa la vlan" type="text" id="vlanInput" style="display: none;" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>
                    
                    {{-- <label for="fecha">Fecha de registro</label> --}}
                    <input type="hidden" type="date" name="fecha" id="fecha" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    
                    <div class="flex justify-center items-center pt-4">
                        <input type="submit" value="Enviar" class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function() {
            $('#fkTipoRed').change(function() {

                var pkTipoRed = $(this).val();
                var vlanInput = $('#vlanInput');

                console.log(pkTipoRed);
                console.log(vlanInput);
                var nombre=$('#fkTipoRed option:selected').text();
                if (nombre == 'Acceso' || nombre == 'acceso' || nombre == 'ACCESO') {
                    vlanInput.show();
                } else {
                    vlanInput.hide();
                }
            });
        });
        
    </script>

</body>
</html>