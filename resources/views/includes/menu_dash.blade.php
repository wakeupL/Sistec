      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Bienvenido {{ Auth::user()->name }}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#Mantenedores" id="navMantenedor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Mantenedores</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navMantenedor">
                        <a class="dropdown-item" href="{{ url('maintainer/users') }}">Usuarios</a>
                        <a class="dropdown-item" href="countries.php">Países</a>
                        <a class="dropdown-item" href="states.php">Regiones</a>
                        <a class="dropdown-item" href="distrits.php">Comunas</a>
                        <a class="dropdown-item" href="zones.php">Zonas</a>
                        <a class="dropdown-item" href="companies.php">Empresas</a>
                        <a class="dropdown-item" href="departaments.php">Departamentos</a>
                        <a class="dropdown-item" href="#">Tipo de contratos</a>
                        <a class="dropdown-item" href="#">Categorías de Tickets</a>
                        <a class="dropdown-item" href="#">Orígen del Ticket</a>
                        <a class="dropdown-item" href="#">Prioridades de atención</a>
                        <a class="dropdown-item" href="#">Estados del Ticket</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Cuenta</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                        <a class="dropdown-item" href="profile.php">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                    </div>
                </li>

            </ul>
          </div>
        </div>
      </nav>