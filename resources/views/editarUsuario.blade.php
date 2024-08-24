<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Editar usuario</title>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
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
                
                <span class="mb-3 text-4xl font-bold">Editar usuario</span>

                    <form action="{{ route('usuario.actualizar', ['pkUsuario' => $dato->pkUsuario]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="py-4">
                            <label for="nombreUsuario">Nombre Persona</label>
                            <input type="text" id="usuario" name="nombrePersona" value="{{ $dato->nombre_persona }}" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        </div>
                        <div class="py-4">
                            <label for="nombreUsuario">Apellido Paterno </label>
                            <input type="text" id="usuario" name="" value="{{ $dato->apellidoPaterno }}" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        </div>
                        <div class="py-4">
                            <label for="nombreUsuario">Apellido Materno </label>
                            <input type="text" id="usuario" name="" value="{{ $dato->apellidoMaterno }}" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        </div>
                        <div class="py-4">
                            <label for="correo">Correo</label>
                            <input type="text" id="usuario" name="correo" value="{{ $dato->correo }}" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        </div>
                        <div class="py-4">
                            <label for="nombreUsuario">Nombre Usuario</label>
                            <input type="text" id="usuario" name="nombreUsuario" value="{{ $dato->nombre_usuario }}" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        </div>
                        <div class="py-4">
                            <label for="contraseña">Contraseña (cifrada)</label>
                            <input type="text" id="usuario" name="contraseña"  class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        </div>
                        <div class="py-4">
                            <label for="fkTipoUsuario">Rol</label>
                            <select id="puesto-trabajo" name="fkTipoUsuario" class="w-full pr-10 pl-10 p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                                @php
                                    use App\Models\tipoUsuario;
                                    $datosTipo = tipoUsuario::all();
                                @endphp
                                @foreach ($datosTipo as $datoU)
                                    <option value="1" {{ $datoU->pkUsuario == $dato->fkTipoUsuario ? 'selected' : '' }}>{{ $datoU->nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    <div class="flex mt-6 gap-4 justify-center">
                        <input type="submit" value="Guardar" class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
                        <input type="submit" value="Cancelar" class="w-fit pr-9 pl-9 bg-gray-900 text-white p-1 rounded-sm mb-3 hover:bg-white hover:text-gray-900 hover:border hover:border-gray-300">
                    </div>
                </form>
            </div>

        </div>
    
    </div>
</body>
</html>