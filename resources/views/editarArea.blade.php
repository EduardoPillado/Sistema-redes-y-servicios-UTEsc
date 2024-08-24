<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar área</title>
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

                <form action="{{ route('area.editar', $datosArea->pkArea) }}" method="post">
                    @csrf
                    @method('put')

                    <h2 class="mb-3 text-4xl font-bold">Editar área</h2>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nom_numArea">Nombre/número de área</label>
                        <input type="text" name="nom_numArea" id="nom_numArea" value="{{$datosArea->nom_numArea}}" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkTipoArea">Tipo de área</label>
                        <select name="fkTipoArea" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosTipoArea as $dato)
                                <option @if ($dato->pkTipoArea == $datosArea->fkTipoArea) selected @endif value="{{$dato->pkTipoArea}}">{{$dato->nombreTipoArea}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkEdificio">Edificio</label>
                        <select name="fkEdificio" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosEdificio as $dato)
                                <option @if ($dato->pkEdificio == $datosArea->fkEdificio) selected @endif value="{{$dato->pkEdificio}}">{{$dato->nombreEdificio}}</option>
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
