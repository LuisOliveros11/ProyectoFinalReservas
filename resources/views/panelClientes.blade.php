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
                <h2 class="text-center">Panel de Clientes</h2>

                <div class="text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear Cliente
                    </button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear un Nuevo Cliente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero_telefonico" class="form-label">Número Telefónico</label>
                                        <input type="text" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contrasena" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contrasena" class="form-label">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="" name="">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Crear Cliente</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th style="width: 17%;">Nombre</th>
                            <th style="width: 17%;">Apellidos</th>
                            <th style="width: 17%;">Teléfono</th>
                            <th style="width: 17%;">Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="small text-truncate">1</td>
                            <td class="small text-truncate">Oscar</td>
                            <td class="small text-truncate">Aguilar</td>
                            <td class="small text-truncate">6121001001</td>
                            <td class="small text-truncate">oscar@gmail.com</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#verClienteModal">Detalles</button>

                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarClienteModal">
                                    Editar
                                </button>

                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarClienteLabel">Editar un Cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="" name="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero_telefonico" class="form-label">Número Telefónico</label>
                                        <input type="text" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contrasena" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="" name="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmar_contrasena" class="form-label">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="" name="">
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


                <div class="modal fade" id="verClienteModal" tabindex="-1" aria-labelledby="verClienteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarClienteLabel">Ver cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="numero_telefonico" class="form-label">Número Telefónico</label>
                                    <input type="text" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="" name="" disabled>
                                </div>
                                <div class="col-mb-3">
                                    <h5>Historial de reservaciones</h5>
                                    <section>
                                        <ul class="timeline">
                                            <li class="timeline-item mb-6">
                                                <h6 class="mb-2 fw-bold">Fecha de reservacion: 2024-12-12</h6>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>08:30:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Hora final:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>08:30:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>2</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="timeline-item mb-6">
                                                <h6 class="mb-2 fw-bold">Fecha de reservacion: 2024-12-12</h6>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>08:30:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Hora final:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>08:30:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>2</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="timeline-item mb-6">
                                                <h6 class="mb-2 fw-bold">Fecha de reservacion: 2024-12-12</h6>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>08:30:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Hora final:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>08:30:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>2</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </section>
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
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>