<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva en Restaurante</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="">Registrar</a>
        <ul class="navbar-nav ms-auto ms-md-10 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="">
                    <li><a class="dropdown-item" href="">Cerrar sesión</a></li>
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
        <div id="layoutSidenav_content">
            <div class="container mt-5">
                <h2 class="text-center">Crear Nueva Reserva</h2>
                <form action="" method="">
                    <div class="mb-3">
                        <label for="Mesa" class="form-label">Numero de Mesa</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sillas" class="form-label">cantidad de sillas</label>
                        <input type="number" class="form-control" id="" name="" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">categoria</label>
                        <input type="time" class="form-control" id="" name="" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">ubicacion</label>
                        <input type="text" class="form-control" id="" name="" required>
                    </div>
                    <div class="mb-3">
                        <label for="disponibilidad" class="form-label">disponibilidad</label>
                        <input type="text" class="form-control" id="" name="" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Guardar Mesa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
