<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar dispositivo</title>
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
                    use App\Models\Edificio;
                    $datosEdificio = Edificio::where('estatus', '=', 1)->get();

                    use App\Models\Marca;
                    $datosMarca = Marca::where('estatus', '=', 1)->get();

                    use App\Models\Modelo;
                    $datosModelo = Modelo::where('estatus', '=', 1)->get();

                    use App\Models\TipoDispositivo;
                    $datosTipoDispositivo = TipoDispositivo::where('estatusTipoDispositivo', '=', 1)->get();
                @endphp
    
                <form action="{{route('dispositivo.editar', $datosDispositivo->pkDispositivo)}}" class="formulario123 dropzone" id="myDropzone" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')

                    <h2 class="mb-3 text-4xl font-bold">Editar dispositivo</h2>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Nombre dispositivo</label>
                        <input type="text" id="nombre" name="nombre" value="{{$datosDispositivo->nombre}}" required class="w-full p-2 border border-gray-300 rounded-md placeholderfont-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="serie">Serie</label>
                        <input type="text" id="serie" name="serie" value="{{$datosDispositivo->serie}}" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="foto">Agregar fotos</label>
                        <input type="file" id="foto" name="fotito[]" accept="image/*" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" multiple>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="edificio">Edificio</label>
                        <select id="edificio" name="fkEdificio" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosEdificio as $dato)
                                <option @if ($dato->pkEdificio == $datosDispositivo->fkEdificio) selected @endif value="{{$dato->pkEdificio}}">{{$dato->nombreEdificio}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="marca">Marca</label>
                        <select id="marca" name="fkMarca" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosMarca as $dato)
                                <option @if ($dato->pkMarca == $datosDispositivo->fkMarca) selected @endif value="{{$dato->pkMarca}}">{{$dato->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="modelo">Modelo</label>
                        <select id="modelo" name="fkModelo" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosModelo as $dato)
                                <option @if ($dato->pkModelo == $datosDispositivo->fkModelo) selected @endif value="{{$dato->pkModelo}}">{{$dato->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="cantidadPuertos">Cantidad de puertos del dispositivo</label>
                        <input type="number" id="cantidad" name="cantidadPuertos" value="{{$datosDispositivo->cantidadPuertos}}" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="fkTipoDispositivo">Tipo de dispositivo</label>
                        <select id="fkTipoDispositivo" name="fkTipoDispositivo" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosTipoDispositivo as $dato)
                                <option @if ($dato->pkTipoDispositivo == $datosDispositivo->fkTipoDispositivo) selected @endif value="{{$dato->pkTipoDispositivo}}">{{$dato->nombreTipoDispositivo}}</option>
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

    <script>
        Dropzone.autoDiscover = false;

        Dropzone.options.myDropzone = {
            paramName: "fotito",
            maxFilesize: 2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxFiles: null, // Configúralo a null para permitir cualquier cantidad de archivos
            dictDefaultMessage: "Arrastra archivos aquí o haz clic para subir",
            init: function () {
                this.on("success", function (file, response) {
                    console.log(response);
                });
            },
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            uploadMultiple: true, // Asegúrate de que esta opción esté configurada
        };
    </script>

</body>
</html>
