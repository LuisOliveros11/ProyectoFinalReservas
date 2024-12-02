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
                    <li><button class="dropdown-item" href="">cerrar sesion</button></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                            Dashboard
                        </a>
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

        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <div class="d-flex flex-row justify-content-between align-items-stretch">
                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2">Cantidad de Clientes Nuevos</div>
                            <h2 class="h3">452</h2>
                            <div class="small mt-2 text-success">
                                <span class="fas fa-angle-up"></span> +18.2%
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2">Mesas</div>
                            <h2 class="h3">30</h2>
                            <div class="small mt-2 text-info">
                                <span class="fas fa-chart-line"></span> En uso: 20
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2">Usuarios</div>
                            <h2 class="h3">150</h2>
                            <div class="small mt-2 text-warning">
                                <span class="fas fa-user"></span> Activos: 140
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2">Reservas</div>
                            <h2 class="h3">85</h2>
                            <div class="small mt-2 text-danger">
                                <span class="fas fa-calendar-alt"></span> Canceladas: 5
                            </div>
                        </div>
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col-6">
                        <h2 class="text-center">Clientes mas Recientes</h2>

                        <table class="table table-striped mt-6">

                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de Registro</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Oscar</td>
                                    <td>Aguilar</td>
                                    <td>2024-11-28</td>
                                    <td>oscar@gmail.com</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>



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