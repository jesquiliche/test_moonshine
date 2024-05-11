<div class="bg-gray-50 fixed z-10 w-full shadow-lg flex items-center justify-between">
    <div class="flex items-center mx-3">
        <a href="/" class="flex items-center">
            <img src="logo_low.png" class="h-16 w-16" alt="Logo">
            <h1 class="text-3xl font-bold italic m-4">Test tai</h1>
        </a>
    </div>

    <ul class="hidden lg:flex text-lg font-semibold justify-end space-x-2 p-2 items-center">
        <li class="nav-link">
            <a href="/" onclick="closeMenu()">
                Inicio
            </a>
        </li>
        <li>
            <a href="{{ route('test') }}" class="nav-link" onclick="closeMenu()">
                Test
            </a>
        </li>
        <li>
            <a href="{{ route('register') }}" class="nav-link" onclick="closeMenu()">
                Registro
            </a>
        </li>
        @guest
            <li>
                <a href="{{ route('login') }}" class="nav-link" onclick="closeMenu()">
                    Inicio sesión
                </a>
            </li>
        @endguest

        @if (auth()->check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <li>
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit(); closeMenu();">
                    Logout - {{ auth()->user()->name }}
                </a>
            </li>
        @endif
    </ul>

    <!-- Botón de menú para pantallas pequeñas -->
    <button class="lg:hidden block px-4 py-2 text-gray-800" onclick="toggleMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
    </button>
</div>

<!-- Menú para pantallas pequeñas -->
<div id="mobileMenu" class="hidden lg:hidden bg-gray-50 fixed z-10 w-full shadow-lg flex flex-col items-center justify-start top-0">
    <ul class="text-lg font-semibold justify-end space-y-2 p-2 items-center">
        <li class="nav-link">
            <a href="/" onclick="closeMenu()">
                Inicio
            </a>
        </li>
        <li>
            <a href="{{ route('test') }}" class="nav-link" onclick="closeMenu()">
                Test
            </a>
        </li>
        <li>
            <a href="{{ route('register') }}" class="nav-link" onclick="closeMenu()">
                Registro
            </a>
        </li>
        @guest
            <li>
                <a href="{{ route('login') }}" class="nav-link" onclick="closeMenu()">
                    Inicio sesión
                </a>
            </li>
        @endguest

        @if (auth()->check())
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <li>
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form-mobile').submit(); closeMenu();">
                    Logout - {{ auth()->user()->name }}
                </a>
            </li>
        @endif
    </ul>
</div>

<script>
    function toggleMenu() {
        var mobileMenu = document.getElementById("mobileMenu");
        if (mobileMenu.classList.contains("hidden")) {
            mobileMenu.classList.remove("hidden");
        } else {
            mobileMenu.classList.add("hidden");
        }
    }

    // Función para cerrar el menú después de hacer clic en una opción
    function closeMenu() {
        var mobileMenu = document.getElementById("mobileMenu");
        mobileMenu.classList.add("hidden");
    }
</script>
