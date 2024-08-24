<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar tipo de dispositivo</title>
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
    
    <h2 
    class="mb-3 text-4xl font-bold"
    >Editar Tipo Dispositivo</h2>
    <br><br>
    <form action="{{ route('tipoDispositivo.actualizar', $datosTipoDispositivo->pkTipoDispositivo) }}" method="post">
        @csrf
        @method('put')
        <label for="nombreTipoDispositivo">Nombre del tipo de dispositivo</label>
        <input type="text" name="nombreTipoDispositivo" id="nombreTipoDispositivo" value="{{$datosTipoDispositivo->nombreTipoDispositivo}}" required 
        class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
        >
        <br><br>
        <input type="submit" value="Guardar" 
        class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300"
        >
    </form>
</div>
</div>
</div>

</body>
</html>