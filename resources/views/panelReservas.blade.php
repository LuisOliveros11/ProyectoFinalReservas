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
    @include('layouts.navbar')


    <div id="layoutSidenav">
        @include('layouts.sidevar')



        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <h2 class="text-center">Lista de Reservas</h2>
                <div class="text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservarModal">
                        Crear Reserva
                    </button>
                </div>

                <div class="modal fade" id="reservarModal" tabindex="-1" aria-labelledby="reservarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="reservarModalLabel">Crear una Reserva</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="fecha" class="form-label">Fecha de la Reserva</label>
                                        <input type="date" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inicio" class="form-label">Hora de inicio</label>
                                        <input type="time" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="final" class="form-label">Hora final</label>
                                        <input type="time" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mesa" class="form-label">Número de mesa</label>
                                        <input type="number" class="form-control" id="" name="" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Crear Reserva</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th style="width: 15%;">Cliente</th>
                            <th style="width: 15%;">Número de Personas</th>
                            <th style="width: 15%;">Fecha</th>
                            <th style="width: 15%;">Hora</th>
                            <th style="width: 15%;">Mesa</th>
                            <th style="width: 25%;">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="small text-truncate">1</td>
                            <td class="small text-truncate">oscar</td>
                            <td class="small text-truncate">4</td>
                            <td class="small text-truncate">2024-11-28</td>
                            <td class="small text-truncate">19:00</td>
                            <td class="small text-truncate">1</td>

                            <td>
                                <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#verReservasModal">Detalles</button>

                                <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editarReservaModal">
                                    Editar
                                </button> <button href="" class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="modal fade" id="editarReservaModal" tabindex="-1" aria-labelledby="editarReservaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarReservaModalLabel">Editar una Reserva</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="fecha" class="form-label">Fecha de la Reserva</label>
                                        <input type="date" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inicio" class="form-label">Hora de inicio</label>
                                        <input type="time" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="final" class="form-label">Hora final</label>
                                        <input type="time" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mesa" class="form-label">Número de mesa</label>
                                        <input type="number" class="form-control" id="" name="" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="modal fade" id="verReservasModal" tabindex="-1" aria-labelledby="verReservasModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarClienteLabel">Ver Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha de la Reserva</label>
                                    <input type="date" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="inicio" class="form-label">Hora de inicio</label>
                                    <input type="time" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="final" class="form-label">Hora final</label>
                                    <input type="time" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="mesa" class="form-label">Número de mesa</label>
                                    <input type="number" class="form-control" id="" name="" disabled>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                        </ul>
                    </nav>
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