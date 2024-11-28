<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Charts - SB Admin</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">Registrar</a>
        <!-- Navbar-->
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

                    </div>
                </div>
            </nav>
        </div>

    </div>
    <div class="text" style=" margin-left: 250px; margin-top: 60px;">
        <h1 style="font-size: 2.5rem; color: #000;">Mesas Reservadas</h1>
    </div>


    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-primary" style="position: absolute; top: 100px; right: 100px;">Crear</a>
    </div>


    <div class="card" style="width: 18rem; margin-left: 250px; margin-top: 30px;">
        <img src="https://loredomuebles.com/wp-content/uploads/2017/11/MESAS-e1509988380708.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Mesa 1</h5>
            <!-- aqui que cuando se vean las mesas reservadas se pueda ver la hora que se reservo 
                                -->
            <p class="card-text">Hora reservada: </p>
            <a href="#" class="btn btn-primary">Editar</a>
            <a href="#" class="btn btn-primary">Eliminar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>