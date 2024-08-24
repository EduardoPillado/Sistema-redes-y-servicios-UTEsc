<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <title>Área</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
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

                @php
                    use App\Models\TipoArea;
                    $datosTipoArea = TipoArea::where('estatusTipoArea', '=', 1)->get();

                    use App\Models\Edificio;
                    $datosEdificio = Edificio::where('estatus', '=', 1)->get();
                @endphp

                <form action="{{ route('area.insertar') }}" method="post">
                    @csrf

                    <span class="mb-3 text-4xl font-bold">Agregar área</span>

                    <div class="py-4">
                        <span class="mb-2 text-md">Nombre/número de área</span>
                        <input rows="4" id="descru" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" placeholder="Detalla la ubicación" type="text" name="nom_numArea" required>
                    </div>

                    <div class="py-4">
                        <span class="mb-2 text-md" for="fkEdificio">Edificio</span> - <a href="{{ url('Edificio') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="fkEdificio" required>
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosEdificio as $dato)
                                <option value="{{ $dato->pkEdificio }}">{{ $dato->nombreEdificio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <span class="mb-2 text-md">Tipo Area</span> - <a href="{{ url('tipoArea') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="fkTipoArea" required>
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosTipoArea as $dato)
                                <option value="{{ $dato->pkTipoArea }}">{{ $dato->nombreTipoArea }}</option>
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