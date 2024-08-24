<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Iconos --}}
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}">
    {{-- CSS --}}
    <link rel="stylesheet" href="../css/estilos.css?b=3"> 
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Document</title>
</head>
<body class="bg-gray-100">

      <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
          <div class="flex items-center justify-start">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
             </button>
            </div>
         </div>
      </div>
      <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-56 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
         <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-8 font-medium mt-10">
               <div>
                  <img src="{{ asset('img/cropped-UTESC_logo256-4.png') }}" alt="">
               </div>
               <li>
                  <a href="{{ route('redesRegistradas') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21M12 8V12M6.5 12V16M17.5 12V16M10.1 8H13.9C14.4601 8 14.7401 8 14.954 7.89101C15.1422 7.79513 15.2951 7.64215 15.391 7.45399C15.5 7.24008 15.5 6.96005 15.5 6.4V4.6C15.5 4.03995 15.5 3.75992 15.391 3.54601C15.2951 3.35785 15.1422 3.20487 14.954 3.10899C14.7401 3 14.4601 3 13.9 3H10.1C9.53995 3 9.25992 3 9.04601 3.10899C8.85785 3.20487 8.70487 3.35785 8.60899 3.54601C8.5 3.75992 8.5 4.03995 8.5 4.6V6.4C8.5 6.96005 8.5 7.24008 8.60899 7.45399C8.70487 7.64215 8.85785 7.79513 9.04601 7.89101C9.25992 8 9.53995 8 10.1 8ZM15.6 21H19.4C19.9601 21 20.2401 21 20.454 20.891C20.6422 20.7951 20.7951 20.6422 20.891 20.454C21 20.2401 21 19.9601 21 19.4V17.6C21 17.0399 21 16.7599 20.891 16.546C20.7951 16.3578 20.6422 16.2049 20.454 16.109C20.2401 16 19.9601 16 19.4 16H15.6C15.0399 16 14.7599 16 14.546 16.109C14.3578 16.2049 14.2049 16.3578 14.109 16.546C14 16.7599 14 17.0399 14 17.6V19.4C14 19.9601 14 20.2401 14.109 20.454C14.2049 20.6422 14.3578 20.7951 14.546 20.891C14.7599 21 15.0399 21 15.6 21ZM4.6 21H8.4C8.96005 21 9.24008 21 9.45399 20.891C9.64215 20.7951 9.79513 20.6422 9.89101 20.454C10 20.2401 10 19.9601 10 19.4V17.6C10 17.0399 10 16.7599 9.89101 16.546C9.79513 16.3578 9.64215 16.2049 9.45399 16.109C9.24008 16 8.96005 16 8.4 16H4.6C4.03995 16 3.75992 16 3.54601 16.109C3.35785 16.2049 3.20487 16.3578 3.10899 16.546C3 16.7599 3 17.0399 3 17.6V19.4C3 19.9601 3 20.2401 3.10899 20.454C3.20487 20.6422 3.35785 20.7951 3.54601 20.891C3.75992 21 4.03995 21 4.6 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     <span class="ml-3 whitespace-nowrap font-bold">Rutas</span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('dispositivo') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2h16v6h4v14H12v-6H2V2zm14 6V4H4v10h8V8h4zm-6-2H6v2h4V6zm10 14V10h-6v10h6zm-4-4h2v2h-2v-2zM6 10h4v2H6v-2z" fill="#000000"/>
                    </svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Dispositivos</span>                   
                  </a>
               </li>
               <li>
                  <a href="{{ route('verArea') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Ubicación</span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('Usuario') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 20V18C13 15.2386 10.7614 13 8 13C5.23858 13 3 15.2386 3 18V20H13ZM13 20H21V19C21 16.0545 18.7614 14 16 14C14.5867 14 13.3103 14.6255 12.4009 15.6311M11 7C11 8.65685 9.65685 10 8 10C6.34315 10 5 8.65685 5 7C5 5.34315 6.34315 4 8 4C9.65685 4 11 5.34315 11 7ZM18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Usuarios</span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('encargadoDeArea') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M224 128v704h576V128H224zm-32-64h640a32 32 0 0 1 32 32v768a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32z"/><path fill="#000000" d="M64 832h896v64H64zm256-640h128v96H320z"/><path fill="#000000" d="M384 832h256v-64a128 128 0 1 0-256 0v64zm128-256a192 192 0 0 1 192 192v128H320V768a192 192 0 0 1 192-192zM320 384h128v96H320zm256-192h128v96H576zm0 192h128v96H576z"/></svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Encargado de area</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('verServicios') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title>computer-setting</title><g id="Layer_2" data-name="Layer 2"><g id="invisible_box" data-name="invisible box"><rect width="48" height="48" fill="none"/></g><g id="icons_Q2" data-name="icons Q2"><g><path d="M7,34H19a2,2,0,0,0,0-4H9V10H39V30H29a2,2,0,0,0,0,4H41a2,2,0,0,0,2-2V8a2,2,0,0,0-2-2H7A2,2,0,0,0,5,8V32A2,2,0,0,0,7,34Z"/><path d="M44,38H4a2,2,0,0,0,0,4H44a2,2,0,0,0,0-4Z"/><path d="M31.9,21.3A5.7,5.7,0,0,0,32,20a5.7,5.7,0,0,0-.1-1.3l-2.2-.5a4.2,4.2,0,0,0-.4-1l1.2-1.9a7.7,7.7,0,0,0-1.8-1.8l-1.9,1.2-1-.4-.5-2.2H22.7l-.5,2.2-1,.4-1.9-1.2a7.7,7.7,0,0,0-1.8,1.8l1.2,1.9a4.2,4.2,0,0,0-.4,1l-2.2.5A5.7,5.7,0,0,0,16,20a5.7,5.7,0,0,0,.1,1.3l2.2.5a4.2,4.2,0,0,0,.4,1l-1.2,1.9a7.7,7.7,0,0,0,1.8,1.8l1.9-1.2,1,.4.5,2.2h2.6l.5-2.2,1-.4,1.9,1.2a7.7,7.7,0,0,0,1.8-1.8l-1.2-1.9a4.2,4.2,0,0,0,.4-1ZM24,22a2,2,0,1,1,2-2A2,2,0,0,1,24,22Z"/></g></g></g></svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Servicios</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('verSolicitudes') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="#000000" stroke-width="1.5"/> <path d="M8 13H10.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> <path d="M8 9H14.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> <path d="M8 17H9.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> <path d="M3 14V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157M21 14C21 17.7712 21 19.6569 19.8284 20.8284M4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284M19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="#000000" stroke-width="1.5" stroke-linecap="round"/> </g></svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Solicitudes</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('cerrarSesion') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-200">
                     <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.51465 20H4.51465C3.41008 20 2.51465 19.1046 2.51465 18V6C2.51465 4.89543 3.41008 4 4.51465 4H8.51465V6H4.51465V18H8.51465V20Z" fill="#000000"/>
                        <path d="M13.8422 17.385L15.2624 15.9768L11.3432 12.0242L20.4861 12.0242C21.0384 12.0242 21.4861 11.5765 21.4861 11.0242C21.4861 10.4719 21.0384 10.0242 20.4861 10.0242L11.3239 10.0242L15.3044 6.0774L13.8962 4.6572L7.50527 10.9941L13.8422 17.385Z" fill="#000000"/>
                        </svg>
                     <span class="flex-1 ml-3 whitespace-nowrap font-bold">Cerrar sesión</span>
                  </a>
               </li>
            </ul>
         </div>
      </aside>

    
</body>
</html>