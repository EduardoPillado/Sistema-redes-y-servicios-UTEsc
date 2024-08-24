<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="css/estilos.css"> 
    <script src="https://kit.fontawesome.com/9064601a48.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="inicio">

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            
            <div class="flex flex-col justify-center p-8 md:p-14">
                
                <span class="mb-3 text-4xl font-bold">Bienvenido</span>

                <span class="font-light text-gray-400 mb-8">Ingresa tus datos</span>

<form action="{{ route('inicioSesion') }}" method="post" class="login-form">
    @csrf
    <div class="contenedor_login">
        
    </div>
    <h2 class="bienvenido">Bienvenido de nuevo</h2>
    <div class="py-4">
    <label class="letras_login mb-2 text-mb" for="e_mail">Nombre usuario</label>
    <input class="input_isesion w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre usuario"  required>
    </div>
    <div class="py-4">
    <label class="letras_login mb-2 text-md" for="contraseña">Contraseña</label>
    <input class="input_isesion w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" type="password" name="contraseña" id="contraseña"  placeholder="Ingrese su contraseña"  required>
    </div>
    
    <input class="boton_subir w-full bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300" type="submit" value="Iniciar sesión">
</div>
<div class="relative">

    <img src="https://utescuinapa.edu.mx/wp-content/uploads/2022/09/2-IMG_6275-.jpg" alt="img" class="w-[400px] h-full rounded-r-2xl md-block object-cover"/>

    <div class="absolute hidden bottom-10 right-6 p-6 bg-white bg-opacity-30 backdrop-blur-sm rounded drop-shadow-lg md:block">
        <span class="text-dark-gray text-xl">
            Sistema <br/> de Redes <br/> UTEsc
        </span>
    </div>
</form>
</div>

</div>

</div>

</body>
</html>
