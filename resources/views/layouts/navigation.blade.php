<nav class="bg-white border-b border-gray-100">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <!-- Branding -->
        <div>
            <a href="{{ url('/') }}" class="text-lg font-bold">Clínica Hospitalaria</a>
        </div>

        <!-- Links -->
        <div class="flex items-center space-x-4">
            @auth
                <!-- Mostrar solo para usuarios autenticados -->
                <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-500">Dashboard</a>
                <a href="{{ route('patients.index') }}" class="text-gray-800 hover:text-blue-500">Pacientes</a>
                <a href="{{ route('logout') }}" class="text-gray-800 hover:text-blue-500"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <!-- Mostrar para usuarios no autenticados -->
                <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-gray-800 hover:text-blue-500">Registrarse</a>
            @endauth
        </div>
    </div>
</nav>
