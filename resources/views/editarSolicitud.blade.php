<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar solicitud</title>
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

                <h2 class="mb-3 text-4xl font-bold">Editar Solicitud</h2>
                    
                @php
                    use Carbon\Carbon;
                @endphp

                <form  class="formulario123"action="{{ route('solicitud.actualizar', $datosSolicitud->pkSolicitud) }}"enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Asunto</label>
                        <input type="text" id="asunto" name="asunto" value="{{$datosSolicitud->asunto}}"required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <h2 class="mb-3 text-md font-bold" for="serie">Destinatario(s):</h2>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="serie">Nombre de destinatario:</label>
                        <input type="text" id="nombreDestinatario" name="nombreDestinatario" value="{{$datosSolicitud->destinatario->nombreDestinatario}}"required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>
                    
                    <div class="py-4">
                        <label class="mb-2 text-md" for="serie">Apellido paterno:</label>
                        <input type="text" id="apellidoPaternoDestinatario" name="apellidoPaternoDestinatario" value="{{$datosSolicitud->destinatario->apellidoPaternoDestinatario}}"required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="serie">Apellido materno:</label>
                        <input type="text" id="apellidoMaternoDestinatario" name="apellidoMaternoDestinatario" value="{{$datosSolicitud->destinatario->apellidoMaternoDestinatario}}" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="serie">Cargo:</label>
                        <input type="text" id="cargo" name="cargo" value="{{$datosSolicitud->destinatario->cargo}}" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <br><hr style="height: 4px">

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Descripción de solicitud</label>
                        <textarea type="text" id="descripcionSolicitud" name="descripcionSolicitud" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">{{ $datosSolicitud->descripcionSolicitud }}</textarea>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Caracteristicas</label>
                        <textarea type="text" id="caracteristicas" name="caracteristicas" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">{{ $datosSolicitud->caracteristicas }}</textarea>
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="nombre">Costo</label>
                        <input type="text" id="costo" name="costo"  value="{{$datosSolicitud->costo}}" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>

                    <div class="py-4">
                        <label class="mb-2 text-md" for="despedida">Despedida</label>
                        <textarea type="text" id="despedida" name="despedida" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">{{ $datosSolicitud->despedida }}</textarea>
                    </div>
                      
                    <input type="hidden" type="date" name="fechaSolicitud" id="fechaSolicitud" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                           
                    <div class="py-4">
                        <label class="mb-2 text-md" for="solicitante">Solicitante</label>
                        <input type="text" id="solicitante" name="solicitante" value="{{$datosSolicitud->solicitante}}" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                    </div>
                    
                    <div class="py-4">
                        <label class="mb-2 text-md" for="cargoSolicitante">Cargo solicitante</label>
                        <input type="text" id="cargoSolicitante" name="cargoSolicitante" value="{{$datosSolicitud->cargoSolicitante}}" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
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
