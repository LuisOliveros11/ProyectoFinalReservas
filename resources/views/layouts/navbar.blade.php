<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <img src="{{ asset('img/logo_restaurante.png') }}" alt="" class="img-logo">
    <a class="navbar-brand ps-3" href="">Restaurante</a>
    <ul class="navbar-nav ms-auto ms-md-10 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="">
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <form method="POST" action="{{route(name: 'logout')}}">
                    @csrf
                    @method('POST')
                    <li><button class="dropdown-item" type="submit">cerrar sesion</button></li>
                </form>
            </ul>
        </li>
    </ul>
</nav>