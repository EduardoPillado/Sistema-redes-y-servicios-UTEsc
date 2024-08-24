<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
  <title>Usuario</title>
  <link rel="stylesheet" href="estilos.css">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
        
  <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
        
  <div class="flex flex-col justify-center p-8 md:p-14">

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
  @php
    use App\Models\TipoUsuario;
    $datosTipoUsuario = TipoUsuario::where('tipoUsuario.estatus', '=', 1)->get();
  @endphp
  <!-- Contenido principal de inicio -->
  
      <span class="mb-3 text-4xl font-bold">Agregar Usuario</span>

      <form action="{{route('Usuario.agregar')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="py-4">
            <label class="mb-2 text-md" for="nombre">Nombres:</label>
            <input type="text" id="usuario" name="nombre" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
          </div>

          <div class="py-4">
            <label class="mb-2 text-md" for="apellidoPaterno">Apellido Paterno:</label>
            <input type="text" id="usuario" name="apellidoPaterno" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
          </div>

          <div class="py-4">
            <label class="mb-2 text-md" for="apellidoMaterno">Apellido Materno:</label>
            <input type="text" id="usuario" name="apellidoMaterno" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
          </div>
          
          <div class="py-4">
            <label class="mb-2 text-md" for="correo">Correo</label>
            <input type="text" id="usuario" name="correo" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
          </div>

          <div class="py-4">
            <label class="mb-2 text-md" for="nombreUsuario">Nombre Usuario</label>
            <input type="text" id="usuario" name="nombreUsuario" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
          </div>

          <div class="py-4">
            <label class="mb-2 text-md" for="contraseña">Contraseña</label>
            <input type="password" id="usuario" name="contraseña" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
          </div>

          <div class="py-4">
            <label class="mb-2 text-md" for="fkTipoUsuario">Rol</label>
            <select name="fkTipoUsuario" required class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
              <option selected value="">Seleccionar opción</option>
              @foreach ($datosTipoUsuario as $dato)
                  <option value="{{$dato->pkTipoUsuario}}">{{$dato->nombreTipo}}</option>
              @endforeach
            </select>
          </div>
            
          <div class="flex justify-center items-center pt-4">
            <input type="submit" value="Guardar" class="w-fit my-3 pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
          </div>
          <div class="flex justify-center items-center pt-4">
            <input type="submit" value="Cancelar" class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
          </div>
      </form>
    </div>

  </div>
  
</div>
</body>
</html>