<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Editar edificio</title>
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

  <!-- Contenido principal de inicio -->
<div>
  <form   class="formulario123" action="{{ route('edificio.actualizar', ['pkEdificio' => $datosEdificio->pkEdificio]) }}" enctype="multipart/form-data" method="post">
      @csrf
      @method('put')
      <label  class="labelTitulo" for="">Editar Edificio</label>
      <div>
        <label class="labelTitulo" for=""> Edificio</label>
        <input  class="inputciudad"type="text" name="nombreEdificio" value="{{ $datosEdificio->nombreEdificio }}" required>
      </div>
      <div>
        <label class="labelTitulo" for=""> Seudonimo</label>
        <input  class="inputciudad"type="text" name="pseudonimo" value="{{ $datosEdificio->pseudonimo}}" required>
      </div>
      <div class="centrar">
      <input class="agregar" type="submit" value="Actualizar">
      <input class="submit" type="submit" value="Resetear Valores">
      </div>
    </form>

</div>

</body>
</html>
