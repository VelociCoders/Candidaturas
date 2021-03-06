<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">    
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest

            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                </li>
            @endif
            
            {{-- @if((User::user()->count() == 0)) --}}
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Dar de alta') }}</a>
                </li>
            @endif

        @else

            <!--Nav Bar Hooks - Do not delete!!-->

            {{-- Usuarios --}}
            @can('view-token')           
                <a class="nav-link" href="{{ url('../users') }}">
                    <i class="fas fa-users text-info"></i> Usuarios
                </a>
            @endcan
          
            {{-- Roles --}}
            @can('create-role')
                <a class="nav-link" href="{{ url('../roles') }}">
                    <i class="fas fa-key text-info"></i> Roles
                </a>
            @endcan

            {{-- Escuelas --}}
            @can('view-school')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-school text-info"></i> Escuelas
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('/escuelas') }}">
                        Listado
                    </a>
                    @can('create-school')
                    <a class="dropdown-item" href="{{ url('/escuelas-admin') }}"><i class="fas fa-edit text-info"></i> Administrar escuelas</a> 
                    @endcan
                </div>
            </li>
            @endcan

            {{-- Promos --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('/promos') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-graduation-cap text-info"></i> Promos
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('promos') }}">
                        Listado
                    </a>
                    @can('create-promo')
                    <a class="dropdown-item" href="{{ url('/promos-admin') }}"><i class="fas fa-edit text-info"></i> Administrar promos</a>
                    @endcan
                </div>
            </li>

            {{-- Coders --}}
            {{-- <li class="nav-item">
                <a href="{{ url('/coders') }}" class="nav-link"><i class="fas fa-laptop-code text-info"></i> Coders</a> 
            </li> --}}
            
            {{-- Profile --}}
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user-shield text-info"></i> {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    {{--  <a class="dropdown-item" href="{{ url('/profile') }}">Mi perfil</a> --}}

                    @can('create-token')
                    <a class="dropdown-item" href="{{ url('/tokens') }}">Token</a>
                    @endcan
                    <a class="dropdown-item dropdown-last-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        @endguest
    </ul>
</div>