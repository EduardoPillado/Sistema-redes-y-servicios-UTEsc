<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <link rel="stylesheet" href="">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Servicio</title>
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
                            
                <span class="mb-3 text-4xl font-bold">Agregar servicio</span>

                @php
                    use App\Models\Dispositivo;
                    $datosDispositivo = Dispositivo::where('dispositivo.estatus', '=', 1)->get();

                    use App\Models\TipoServicio;
                    $datosTipoServicio = TipoServicio::all();

                    use App\Models\Accion;
                    $datosAccion = Accion::all();

                    use App\Models\Area;
                    $datosArea = Area::where('area.estatusArea', '=', 1)->get();
                @endphp

                <form action="{{ route('servicio.insertar') }}" method="post">
                    @csrf
                        
                    <div class="py-4">
                        <h3 class="mb-2 text-md">Selecciona el dispositivo que se le hizo el servicio</h3>
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
                                            class="form-checkbox">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $dato->nombre  }}</td>                    
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkTipoServicio">Tipo de servicio</label> - <a href="{{ url('tipoServicio') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select name="fkTipoServicio" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosTipoServicio as $dp)
                                <option value="{{$dp->pkTipoServicio}}">{{$dp->nombreTipoServicio}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="foto">Agregar foto:</label>
                        <input type="file" id="foto" name="fotito" accept="image/*" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="descripcion">Ingrese una descripción del servicio:</label>
                        <input type="text" id="descripcion" name="descripcion" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="observaciones">Ingrese observaciones del servicio:</label>
                        <input type="text" id="observaciones" name="observaciones" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    {{-- <div class="py-4"> --}}
                        {{-- <label class="mb-2 text-md" for="fechaServicio">Fecha de registro</label> --}}
                        <input type="hidden" type="date" name="fechaServicio" id="fechaServicio" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    {{-- </div> --}}

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkAccion">Ingrese una acción</label> - <a href="{{ url('accion') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select name="fkAccion" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosAccion as $dp)
                                <option value="{{$dp->pkAccion}}">{{$dp->nombreAccion}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkArea">Ingrese area en la que se hizo el servicio</label>
                        <select name="fkArea" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosArea as $dp)
                                <option value="{{$dp->pkArea}}">{{$dp->nom_numArea}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-center items-center pt-4">
                        <input type="submit" value="Enviar" class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>