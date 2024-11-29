<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reserva en Restaurante</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="">Registrar</a>
        <ul class="navbar-nav ms-auto ms-md-10 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="">cerrar sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Panel de mesas</div>

                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-utensils"></i></div>
                            Mesas
                        </a>
                        <div class="sb-sidenav-menu-heading">Panel de reservas</div>

                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Reservas
                        </a>
                        <div class="sb-sidenav-menu-heading">Panel de clientes</div>

                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                        </a>
                        <div class="sb-sidenav-menu-heading">Panel de usuarios</div>

                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Usuarios
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="d-flex justify-content-end">
            <a href="" class="btn btn-primary" style="position: absolute; top: 80px; right: 85px;">Crear</a>
        </div>

        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <h2 class="text-center">Lista de Reservas</h2>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Número de Personas</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Mesa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>oscar</td>
                            <td>4</td>
                            <td>2024-11-28</td>
                            <td>19:00</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">Editar</a>
                                <a href="" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>


</html>