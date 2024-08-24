<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar tipo de servicio</title>
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

    <h2>Editar Tipo Servicio</h2>
    <br><br>
    <form action="{{ route('tipoServicio.actualizar', $datosTipoServicio->pkTipoServicio) }}" method="post">
        @csrf
        @method('put')
        <label for="nombreTipoArea">Nombre del tipo de área</label>
        <input type="text" name="nombreTipoServicio" id="nombreTipoServicio" value="{{$datosTipoServicio->nombreTipoServicio}}" required>
        <br><br>
        <input type="submit" value="Guardar">
    </form>
    
</body>
</html>