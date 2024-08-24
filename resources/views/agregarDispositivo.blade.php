<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Dispositivo</title>
    <style>
        .dropzone {
            min-height: 150px;
            border: 2px solid white;
            background: #fff;
            padding: 20px 20px;
        }
    </style>
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
    
                <form class="formulario123 dropzone" id="myDropzone" action="{{ route('dispositivo.insertar') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <h2 class="mb-3 text-4xl font-bold">Agregar dispositivo</h2>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Nombre</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="nombre" id="nombre" required/>
                    </div>
                    
                    <div class="py-4">
                        <label class="mb-2 text-md" for="serie">Serie</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="serie" id="serie"required/>
                    </div>
                    
                    <div class="py-4">
                        <div class="">
                            <label class="mb-2 text-md" for="foto">Agregar fotos</label>
                            <input type="file" id="foto" name="fotito[]" accept="image/*" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" multiple required>
                        </div>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="edificio">Edificio</label> - <a href="{{ url('Edificio') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select id="edificio" name="fkEdificio" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required>
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosEdificio as $dato)
                                <option value="{{$dato->pkEdificio}}">{{$dato->nombreEdificio}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="marca">Marca</label> - <a href="{{ url('marca') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select id="marca" name="fkMarca" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required>
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosMarca as $dato)
                                <option value="{{$dato->pkMarca}}">{{$dato->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="modelo">Modelo</label> - <a href="{{ url('modelo') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select id="modelo" name="fkModelo" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required>
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosModelo as $dato)
                                <option value="{{$dato->pkModelo}}">{{$dato->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="py-4">
                        <label class="mb-2 text-md" for="cantidadPuertos">Cantidad de puertos del dispositivo</label>
                        <input type="number" name="cantidadPuertos" id="cantidadPuertos" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>
                    
                    <div class="py-4">
                        <label class="mb-2 text-md" for="tipoDispositivo">Tipo de dispositivo</label> - <a href="{{ url('tipoDispositivo') }}" style="color: rgb(85, 85, 85)">agregar</a>
                        <select id="tipoDispositivo" name="fkTipoDispositivo" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required>
                            <option selected value="">Seleccionar opción</option>
                            @foreach ($datosTipoDispositivo as $dato)
                                <option value="{{$dato->pkTipoDispositivo}}">{{$dato->nombreTipoDispositivo}}</option>
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
