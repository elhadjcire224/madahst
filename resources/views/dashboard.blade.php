<!-- component -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página con Tailwind</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-white border-b border-gray-300">
        <div class="flex justify-between items-center px-6">
            <!-- Ícono de Menú (cyan) -->
            <button id="menu-button" onclick="expandSidebar()">
            <i class="fas fa-bars text-cyan-500 text-lg"></i>
            </button>
            <!-- Logo (centrado) -->
            <div class="mx-auto">
                <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="logo" class="h-20 w-28">
            </div>
            <!-- Ícono de Notificación y Perfil -->
            <div class="space-x-4">
                <button>
                    <i class="fas fa-bell text-cyan-500 text-lg"></i>
                </button>
                <!-- Botón de Perfil -->
                <button>
                    <i class="fas fa-user text-cyan-500 text-lg"></i>
                </button>
            </div>
        </div>
    </nav>
    

 <!-- Barra lateral -->
<div id="sidebar" class="w-28 bg-white h-screen fixed rounded-none border-none transition-all duration-200 ease-in-out overflow-hidden">
    <!-- Items -->
    <div class="p-2 space-y-4">
        <!-- Inicio -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group" onclick="highlightSidebarItem(this)">
            <i class="fas fa-home text-lg"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Inicio</span>
        </button>

        <!-- Autorizaciones -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group" onclick="highlightSidebarItem(this)">
            <i class="fas fa-check-circle"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Autorizaciones</span>
        </button>

        <!-- Usuarios -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group" onclick="highlightSidebarItem(this)">
            <i class="fas fa-users"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Usuarios</span>
        </button>

        <!-- Comercios -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group" onclick="highlightSidebarItem(this)">
            <i class="fas fa-store"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Comercios</span>
        </button>

        <!-- Transacciones -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group" onclick="highlightSidebarItem(this)">
            <i class="fas fa-exchange-alt"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Transacciones</span>
        </button>

        <!-- Cerrar sesión -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group" onclick="highlightSidebarItem(this)">
            <i class="fas fa-sign-out-alt"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Cerrar sesión</span>
        </button>
    </div>
</div>


<!-- Contenedor gris al lado de la barra lateral -->
<div class="ml-16 bg-gray-100 h-screen fixed w-full lg:w-3/4 transition-all duration-200 ease-in-out">

    <!-- Buscador con Icono -->
    <div class="flex items-center w-full mt-2 p-4">
        <div class="relative w-full">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <i class="fas fa-search text-gray-200"></i>
            </span>
            <input type="text" class="pl-10 pr-4 py-2 rounded-full border border-gray-300 w-full text-sm placeholder-gray-400" placeholder="Buscar..." />
        </div>
    </div>

 <!-- Contenedor de las 4 secciones -->
<div class="grid grid-cols-2 gap-4 mt-2 p-4">
    <!-- Sección 1 - Gráfica de Usuarios -->
    <div class="bg-white p-4 rounded-md">
        <h2 class="text-gray-600 text-lg font-semibold pb-4">Usuarios</h2>
        <div class="chart-container" style="position: relative; height:200px; width:200px">
            <!-- El canvas para la gráfica -->
            <canvas id="usersChart"></canvas>
        </div>
    </div>

    <!-- Sección 2 - Gráfica de Comercios -->
    <div class="bg-white p-4 rounded-md">
        <h2 class="text-gray-600 text-lg font-semibold pb-4">Comercios</h2>
        <div class="chart-container" style="position: relative; height:200px; width:200px">
            <!-- El canvas para la gráfica -->
            <canvas id="commercesChart"></canvas>
        </div>
    </div>

    <!-- Sección 3 - Tabla de Autorizaciones Pendientes -->
    <div class="bg-white p-4 rounded-md">
        <h2 class="text-gray-600 text-lg font-semibold pb-4">Autorizaciones Pendientes</h2>
        <table class="w-full table-auto">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Foto</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nombre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-right">Rol</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"><img src="https://via.placeholder.com/40" alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                    <td class="py-4 px-6 border-b border-grey-light">Juan Pérez</td>
                    <td class="py-4 px-6 border-b border-grey-light text-right">Administrador</td>
                </tr>
                <!-- Añade más filas aquí como la anterior para cada autorización pendiente -->
            </tbody>
        </table>
    </div>

    <!-- Sección 4 - Tabla de Transacciones -->
    <div class="bg-white p-4 rounded-md">
        <h2 class="text-gray-600 text-lg font-semibold pb-4">Transacciones</h2>
        <table class="w-full table-auto">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nombre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fecha</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-right">Monto</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">Carlos Sánchez</td>
                    <td class="py-4 px-6 border-b border-grey-light">27/07/2023</td>
                    <td class="py-4 px-6 border-b border-grey-light text-right">$1500</td>
                </tr>
                <!-- Añade más filas aquí como la anterior para cada transacción -->
            </tbody>
        </table>
    </div>
</div>

<script>
    function expandSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.ml-16');

        if (sidebar.style.width === '16rem') {
            sidebar.style.width = '4rem';
            mainContent.style.marginLeft = '4rem';
            sidebar.classList.remove('text-left', 'px-6');
            sidebar.classList.add('text-center', 'px-0');
        } else {
            sidebar.style.width = '16rem';
            mainContent.style.marginLeft = '16rem';
            sidebar.classList.add('text-left', 'px-6');
            sidebar.classList.remove('text-center', 'px-0');
        }

        const labels = sidebar.querySelectorAll('span');
        labels.forEach(label => label.classList.toggle('opacity-0'));
    }

    function highlightSidebarItem(element) {
    const buttons = document.querySelectorAll("#sidebar button");
    buttons.forEach(btn => {
        btn.classList.remove('bg-gradient-to-r', 'from-cyan-400', 'to-cyan-500', 'text-white', 'w-48', 'ml-0');
        btn.firstChild.nextSibling.classList.remove('text-white');
    });
    element.classList.add('bg-gradient-to-r', 'from-cyan-400', 'to-cyan-500', 'w-56', 'h-10','ml-0');
    element.firstChild.nextSibling.classList.add('text-white');
    }   

   
</script>
