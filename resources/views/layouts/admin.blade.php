<!-- component -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madahst</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{isOpen:false}">
  @include('admin.admin-nav')



    <div id="sidebar"
    :class="{'w-[16rem] ml-[16rem] 4rem text-left px-6':isOpen}"
     class="w-28 bg-white h-screen fixed rounded-none border-none transition-all duration-200 ease-in-out overflow-hidden 16rem">
        <!-- Items -->
        <div class="p-2 space-y-4">
            
            <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
                <i class="fas fa-home text-lg"></i>
                <span class="font-medium transition-all duration-200 opacity-0">Inicio</span>
            </button>

            
            <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
                <i class="fas fa-check-circle"></i>
                <span class="font-medium transition-all duration-200 opacity-0">Autorizaciones</span>
            </button>

            
            <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
                <i class="fas fa-users"></i>
                <span class="font-medium transition-all duration-200 opacity-0">Usuarios</span>
            </button>

            <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
                <i class="fas fa-store"></i>
                <span class="font-medium transition-all duration-200 opacity-0">Comercios</span>
            </button>

            <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
                <i class="fas fa-exchange-alt"></i>
                <span class="font-medium transition-all duration-200 opacity-0">Transacciones</span>
            </button>

            <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
                <i class="fas fa-sign-out-alt"></i>
                <span class="font-medium transition-all duration-200 opacity-0">Cerrar sesión</span>
            </button>
        </div>
    </div>


    <div class="ml-16 bg-gray-100 h-screen fixed w-full lg:w-3/4 transition-all duration-200 ease-in-out">
