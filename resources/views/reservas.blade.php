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
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">Registrar</a>
        <!-- Navbar-->
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
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
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

        <!-- Main content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <h1 class="text-center mb-4">Reserva en Restaurante</h1>

                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="personas" class="form-label">Número de Personas</label>
                            <input type="number" class="form-control" id="personas" name="personas" min="1" max="20" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de Reserva</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora de Reserva</label>
                            <input type="time" class="form-control" id="hora" name="hora" required>
                        </div>

                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios adicionales</label>
                            <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Realizar Reserva</button>
                        </div>

                        <br>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
