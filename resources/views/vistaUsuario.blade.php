</div><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/LOGO_UTESC.ico') }}" rel="icon">
    <title>Usuarios</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1a9lGqDzYM+ij3QpkeXG2bD0hq1vT2iMZ8E=" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">

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

      <div class="p-4 sm:ml-64">
        <div class="flex items-center justify-center">
        
           <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0 w-[22rem] md:w-[40rem] md:mt-[10rem]">
              
              <div class="flex flex-col justify-center p-8 md:p-14">
                
                <div class="flex justify-between">
                <form id="formBusqueda" action="{{ route('buscarUsuarios') }}" method="GET" class="w-[10rem] md:w-[15rem]"">
                    @csrf
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="searchTerm"
                         class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                         value="{{ request()->query('searchTerm') }}"  placeholder="Buscar">
                    </div>
                </form>

                    <div class="flex">
                        <a href="{{ url('registroDeUsuario') }}"  class="flex">
                            <span class="font-bold flex items-center text-sm md:text-base">Agregar    
                                <svg class="w-6 md:w-8 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>         
                            </span> 
                        </a>
                    </div>
                 </div>
                <div id="resultadosBusqueda">

                </div>
    

                   
           </div>
        </div>
     </div>

     <script>



$(document).ready(function () {
    // Variable para almacenar la solicitud Ajax actual
    var currentAjaxRequest = null;
   

    // Función para cargar datos iniciales y mostrar resultados
    function cargarDatosYMostrarResultados(searchTerm = null) {
        // Cancelar la solicitud Ajax actual si existe
        if (currentAjaxRequest) {
            currentAjaxRequest.abort();
        }

        var url = '{{ route("buscarUsuarios") }}';

        // Si se proporciona un término de búsqueda, ajustar la URL
        if (searchTerm) {
            url += '?searchTerm=' + searchTerm;
        }

        // Realizar la nueva solicitud Ajax
        currentAjaxRequest = $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                // Limpiar resultados anteriores
                $('#resultadosBusqueda').empty();
               
                // Agregar nuevos resultados
                data.forEach(function (dato) {
                    var resultadoHtml = `
                      
                    <div class="w-full " >
                    <div class="border border-neutral-900 rounded-xl w-[19rem] md:w-[35rem]">
                        <div class="flex">
                            <div class="w-[10rem] h-[10rem] ml-2 mt-2">
                                <p class="font-bold">Nombre de usuario: </p> <span>${ dato.nombre_usuario }</span>
                                <p class="font-bold mt-1">E-mail:</p> <span>${ dato.correo }</span>
                                <p class="font-bold mt-1">Tipo usuario:</p> <span>${ dato.nombreTipo }</span>
                            </div>
                            <div class="flex items-center text-center">
                                <p class="font-bold mr-3 md:ml-[10rem]">${ dato.nombre_persona+ ' ' +dato.apellidoPaterno+ ' ' +dato.apellidoMaterno} </p>
                            </div>
                        </div>
                        <div class=" flex items-center justify-center gap-14 mb-3 md:mt-7">
                           <a href="{{ route("usuario.mostrarId", ':pkUsuario') }}" class="mostrar-id mt-4" data-pkUsuario="${dato.pkUsuario}">
                              <svg class="w-[2rem] h-[2rem]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#000000"/>
                              </svg>
                           </a>
                           
                           <a href="{{ route("usuario.baja", ':pkUsuario') }}"  class="baja-usuario mt-4" data-pkUsuario="${dato.pkUsuario}">
                              <svg class="w-[2rem] h-[2rem]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                 <g id="SVGRepo_iconCarrier"> <path d="M9 16C9 16.5523 8.55228 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16Z" fill="#000000"/> <path d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z" fill="#000000"/> <path d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z" fill="#000000"/> <path d="M6 10V8C6 7.65929 6.0284 7.32521 6.08296 7M18 10V8C18 4.68629 15.3137 2 12 2C10.208 2 8.59942 2.78563 7.5 4.03126" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> <path d="M11 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> </g>
                              </svg>
                           </a>
                        </div>
                    </div>
                    <br>
                 </div>
                    `;
                    resultadoHtml = resultadoHtml.replace(/:pkUsuario/g, dato.pkUsuario);
                    $('#resultadosBusqueda').append(resultadoHtml);
                })(dato);
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }

    // Cargar datos iniciales al iniciar la página
    cargarDatosYMostrarResultados();

    // Manejar la presentación de resultados mientras se escribe en el campo de búsqueda
    $('#default-search').on('input', function () {
        var searchTerm = $(this).val();
        cargarDatosYMostrarResultados(searchTerm);
    });
});

 

</script>
 
</body>
</html>
