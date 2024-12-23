
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="./home">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Panel de mesas</div>

                <a class="nav-link" href="./panelMesas">
                    <div class="sb-nav-link-icon"><i class="fas fa-utensils"></i></div>
                    Mesas
                </a>
                <div class="sb-sidenav-menu-heading">Panel de reservas</div>

                <a class="nav-link" href="./panelReservas">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Reservas
                </a>
                <div class="sb-sidenav-menu-heading">Panel de clientes</div>

                <a class="nav-link" href="./panelClientes">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Clientes
                </a>
                <div class="sb-sidenav-menu-heading">Panel de usuarios</div>

                <a class="nav-link" href="./panelUsuarios">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Usuarios
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="d-flex align-items-center">
                <i class="fas fa-user-circle fa-2x text-muted circle-icon"></i>
                <div class="ms-2">
                    <div class="small text-truncate" title="Kevin Alberto"><?php echo session('user')->user->nombre.' '.session('user')->user->apellidos ?></div>
                    <div class="small text-truncate" title="Kevin@gmail.com"><?php echo session('user')->user->correo_electronico ?></div>
                </div>
            </div>
        </div>

    </nav>
</div>