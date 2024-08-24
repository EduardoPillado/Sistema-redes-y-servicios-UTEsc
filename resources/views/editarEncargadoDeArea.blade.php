<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar encargado de área</title>
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
                    use App\Models\Area;
                    $datosArea = Area::where('estatusArea', '=', 1)->get();
                @endphp

                <form  class="formulario123" action="{{route('encargadoDeArea.actualizar', $datosEncargadoDeArea->pkEncargadoDeArea)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')

                    <h2 class="mb-3 text-4xl font-bold">Editar encargado de area</h2>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Nombres</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $datosEncargadoDeArea->persona->nombre }}" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" id="apellidoPaterno" name="apellidoPaterno" value="{{ $datosEncargadoDeArea->persona->apellidoPaterno }}" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" id="apellidoMaterno" name="apellidoMaterno"  value="{{ $datosEncargadoDeArea->persona->apellidoMaterno }}" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="correo">Correo</label>
                        <input type="text" id="correo" name="correo" value="{{ $datosEncargadoDeArea->persona->correo }}" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkArea">Área</label>
                        <select id="fkArea" name="fkArea" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            @foreach ($datosArea as $dato)
                                <option @if ($dato->fkArea == $datosEncargadoDeArea->pkArea) selected @endif value="{{$dato->pkArea}}">{{$dato->nom_numArea}}</option>
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
