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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body class="sb-nav-fixed">
    @include('layouts.navbar')

    <div id="layoutSidenav">

        @include('layouts.sidevar')

        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <h1>Dashboard</h1>
                <div class="d-flex flex-row justify-content-between align-items-stretch">
                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 col-lg-10">
                                    <div class="h6 fw-normal text-gray mb-2">Clientes</div>
                                </div>
                                <div class="col-3 col-lg-2">
                                    <div class="sb-nav-link-icon "><i class="fas fa-users"></i></div>
                                </div>
                            </div>

                            <h2 class="h3">452</h2>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 col-lg-10">
                                    <div class="h6 fw-normal text-gray mb-2">Mesas en total</div>
                                </div>
                                <div class="col-3 col-lg-2">
                                    <div class="sb-nav-link-icon "><i class="bi bi-table"></i></div>
                                </div>
                            </div>
                            <h2 class="h3">30</h2>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 col-lg-10">
                                    <div class="h6 fw-normal text-gray mb-2">Usuarios</div>

                                </div>
                                <div class="col-3 col-lg-2">
                                    <div class="sb-nav-link-icon "><i class="fas fa-users"></i></div>
                                </div>
                            </div>
                            <h2 class="h3">30</h2>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 col-lg-10">
                                    <div class="h6 fw-normal text-gray mb-2">Reservaciones</div>

                                </div>
                                <div class="col-3 col-lg-2">
                                    <div class="sb-nav-link-icon "><i class="bi bi-calendar2-check-fill"></i></div>
                                </div>
                            </div>
                            <h2 class="h3">30</h2>

                        </div>
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <h2 class="text-center fs-4 fs-md-3 fs-lg-2">Clientes más Recientes</h2>

                        <div class="table-responsive">
                            <table class="table table-striped mt-6">
                                <thead>
                                    <tr>
                                        <th class="h6 h-md5 h-lg4">Nombre</th>
                                        <th class="h6 h-md5 h-lg4">Apellidos</th>
                                        <th class="h6 h-md5 h-lg4">Fecha de Registro</th>
                                        <th class="h6 h-md5 h-lg4">Email</th>
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
                </div>





            </main>
        </div>


    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>


</html>
<!-- <!DOCTYPE html>
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
    @include('layouts.navbar')

    <div id="layoutSidenav">

        @include('layouts.sidevar')

        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <div class="d-flex flex-row justify-content-between align-items-stretch">
                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2"><i class="fas fa-users"></i> Total de Clientes</div>
                            <h2 class="h3">452</h2>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2"><i class="fas fa-utensils"></i> Total de Mesas</div>
                            <h2 class="h3">30</h2>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2"><i class="fas fa-users"></i> Total de Usuarios</div>
                            <h2 class="h3">150</h2>
                        </div>
                    </div>

                    <div class="card shadow mx-2" style="flex: 1; min-width: 200px;">
                        <div class="card-body text-center">
                            <div class="h6 fw-normal text-gray mb-2"><i class="fas fa-calendar-alt"></i> Total de Reservas</div>
                            <h2 class="h3">85</h2>
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

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>


</html> -->